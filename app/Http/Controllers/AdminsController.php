<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Fund;
use App\Models\Home;
use App\Models\User;
use App\Models\FollowUp;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Notifications\Approval;
use App\Notifications\Rejection;
use Illuminate\Support\Facades\Notification;

class AdminsController extends Controller
{
    public function home() {
        return view('page.admin.home')->with(['menu' => 'admin-home']);
    }
    public function fundraise() {
        return view('page.admin.fundraise')->with(['menu' => 'admin-fundraise']);
    }
    public function complaints() {
        return view('page.admin.complaint')->with(['menu' => 'admin-complaints']);
    }
    public function payout() {
        $payments = [];
        foreach (Fund::where('status', 'COMPLETED')->get() as $key) {
            $payments[$key->feed_id][] = [$key->id, number_format($key->amount, 2), number_format($key->amount*0.05, 2)];
        }
        return view('page.admin.paypal')->with(['menu' => 'admin-report', 'payments' => $payments]);
    }
    public function report() {
        return view('page.admin.report')->with(['menu' => 'admin-report']);
    }
    public function users() {
        return view('page.admin.user')->with(['menu' => 'admin-users']);
    }

    public function saveFund() {
        Fund::whereIn('id', request()->fund_ids)->update(['status' => 'PAID', 'admin_reference' => request()->comment]);
    }

    public function addAdmin() {
        if(User::where('email', request()->email)->count()) {
            if (auth()->user()->email == request()->email) {
                return response()->json(['code' => 401, 'message' => 'You cant assign permissions to yourself']);
            } else {
                User::where('email', request()->email)->update(['current_team_id' => request()->permission]); 
                return response()->json(['code' => 200, 'message' => 'Successfully added']);
            }
        } else {
            return response()->json(['code' => 401, 'message' => 'User Not found']);
        }
    }

    public function removeAdmin() {
        User::find(request()->id)->update(['current_team_id' => null]);
    }

    public function updateComplaint() {
        FollowUp::create([
            'complaint_id' => request()->id,
            'user_id' => auth()->id(),
            'description' => request()->note
        ]);
        if(request()->has('status')) {
            Complaint::find(request()->id)->update(['status' => request()->status]);
        }
    }

    public function feedApproval() {
        $model = Feed::find(request()->id);
        $model->update(['approved_by' => auth()->id(), 'approved_at' => now(), 'expires_at' => now()->addMonths(2)]);  
        User::find($model->user_id)->notify(new Approval($model));
    }

    public function feedRejection() {
        $model = Feed::find(request()->id);
        $model->update(['status' => 'INACTIVE']);
        $note = request()->note;
        User::find($model->user_id)->notify(new Rejection($model, $note));
    }

    public function homeApproval() {
        $model = Home::find(request()->id);
        $model->update(['verified_by' => auth()->id()]);
        if ($model->users()->count()) {
            Notification::send($model->users()->get(), new Approval($model));
        }
    }

    public function homeRejection() {
        $model = Home::find(request()->id);
        $model->update(['document' => null]);
        $note = request()->note;
        if ($model->users()->count()) {
            Notification::send($model->users()->get(), new Rejection($model, $note));
        }
    }
}
