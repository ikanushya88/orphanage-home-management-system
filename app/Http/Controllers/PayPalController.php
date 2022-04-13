<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Fund;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    /**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "LKR",
                        "value" => $request->amount
                    ]
                ]
            ]
        ]);
        // dd($response);
        // $response['id']

        Fund::create([
            'user_id' => auth()->id(),
            'feed_id' => $request->feed_id,
            'transaction_id' => $response['id'],
            'amount' => $request->amount,
            'status' => 'CREATED'
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return back()
                ->withErrors(['error' => 'Something went wrong.']);

        } else {
            return back()
                ->withErrors(['error' => $response['message'] ?? 'Something went wrong.']);
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Fund::where('transaction_id', $response['id'])->whereStatus('CREATED')->update([
                'purchase_units' => json_encode($response['purchase_units']),
                'payer' => json_encode($response['payer']),
                'links' => json_encode($response['links']),
                'status' => 'COMPLETED'
            ]);
            return redirect(Feed::find(Fund::where('transaction_id', $response['id'])->value('feed_id'))->slug)
                ->withErrors(['success' => 'Transaction complete.']);
        } else {
            Fund::where('transaction_id', $response['id'])->whereStatus('CREATED')->update([
                'purchase_units' => json_encode($response['purchase_units']),
                'payer' => json_encode($response['payer']),
                'links' => json_encode($response['links']),
                'status' => 'CANCELLED'
            ]);
            return redirect(Feed::find(Fund::where('transaction_id', $response['id'])->value('feed_id'))->slug)
                ->withErrors(['error' => $response['message'] ?? 'Something went wrong.']);
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        Fund::where('transaction_id', $request['token'])->whereStatus('CREATED')->update([
            'status' => 'CANCELLED'
        ]);
        return redirect(Feed::find(Fund::where('transaction_id', $request['token'])->value('feed_id'))->slug)
            ->withErrors(['error' => 'You have canceled the transaction.']);
    }
}
