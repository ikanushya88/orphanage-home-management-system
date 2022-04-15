@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">    
        <div>
            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> All Pending Funds </h2>
                </div>
                {{-- <button type="button" @if($openForm) disabled @endif wire:click="addingComplaint"
                    class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="md:block hidden"> New Complaint </span>
                </button> --}}
            </div>
            <hr />
            <table class="table w-full mt-3">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 30%">Fund Title</th>
                        <th style="width: 15%" class="text-center">Expected Fund</th>
                        <th style="width: 15%" class="text-center">Received Fund</th>
                        <th style="width: 15%" class="text-center">Paid Fund</th>
                        <th style="width: 20%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($payments as $feed => $funds)
                    @php
                        // $pay = $payment[0];
                        $feed_ = App\Models\Feed::find($feed);
                        $paid = App\Models\Fund::where('feed_id', $feed)->whereIn('status', ['PAID'])->sum('amount');
                        $funded = App\Models\Fund::where('feed_id', $feed)->whereIn('status', ['COMPLETED', 'PAID'])->sum('amount');
                    @endphp
                    <tr class="border-t">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <p class="truncate">{{$feed_->title}}</p>
                        </td>
                        <td class="text-right">
                            LKR {{number_format($feed_->amount, 2)}}
                            <br />
                            <small>
                                <strong class="text-red-600">
                                    (- LKR {{number_format(($feed_->amount * 0.05), 2)}})
                                </strong>
                            </small>
                        </td>
                        <td class="text-right">
                            LKR {{number_format($funded, 2)}}
                            <br />
                            <small>
                                <strong class="text-red-600">
                                    (- LKR {{number_format(($funded * 0.05), 2)}})
                                </strong>
                            </small>
                        </td>
                        <td class="text-right">
                            LKR {{number_format($paid*0.95, 2)}}
                        </td>
                        <td class="text-center">
                            @if(($funded - $paid) > 0)
                            <button class="p-2 rounded bg-blue-800 text-white" onclick="loadPayments('{{json_encode($funds)}}')">
                                <strong><small>PAY <span class="text-blue-200">LKR {{number_format(($funded - $paid)*0.95, 2)}}</span></small></strong>
                            </button>
                            @else
                            ALL PAID
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Payable Fund found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
   <script>
    let loadPayments = json => {
        values = JSON.parse(json);
        html = '<p>Please select the fund to pay.</p><p>Make sure to add an admin note to the fund payout (usually this will be receipt number).</p><div class="mt-2">';
        for (let index = 0; index < values.length; index++) {
            const element = values[index];
            html += `<div class="checkbox block">
                        <input type="checkbox" checked id="chekcbox${element[0]}" name="payments[]" value="${element[0]}" required />
                        <label for="chekcbox${element[0]}"><span class="checkbox-icon"></span> LKR ${element[1]} <br />
                        <small>
                            <strong class="text-red-600">
                                (- LKR ${element[2]})
                            </strong>
                        </small></label>
                    </div>`;
            
        }
        html += '</div><div class="mt-2"><textarea class="text-black shadow-none focus:shadow-none text-xl font-medium resize-none border" style="border: 1px solid lightgrey" name="comment"></textarea></div>';
        $.alert({
            title: 'Fund Payout!',
            content: html,
            buttons: {
                cancel: function () { },
                somethingElse: {
                    text: 'PAY',
                    btnClass: 'bg-blue-800 text-white text-sm font-bold',
                    action: function(){
                        let checked = $('input[name="payments[]"]:checked').map(function() { return this.value; }).get();
                        let comment = $('textarea[name="comment"]').val();
                        if ($('input[name="payments[]"]:checked').length && comment) {
                            $.ajax({
                                type: "put",
                                url: "/admin/fund/pay-back",
                                data: {
                                    _token: '{{csrf_token()}}',
                                    fund_ids: checked,
                                    comment: comment,
                                },
                                success: function (response) {
                                    location.reload();
                                }
                            });
                        } else {
                            $.alert('Must select payments and have a comment');
                            return false;
                        }
                    }
                }
            }
        });
    }
    </script> 
@endsection