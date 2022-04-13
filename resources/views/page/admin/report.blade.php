@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div>
            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> All Received Funds </h2>
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
            <table class="table w-full mt-3 dt-table">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 30%">Fund Title</th>
                        <th style="width: 15%" class="text-center">Received on</th>
                        <th style="width: 15%" class="text-center">Received Amount</th>
                        <th style="width: 15%" class="text-center">Status</th>
                        <th style="width: 20%">Reference</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (App\Models\Fund::whereIn('status', ['COMPLETED', 'PAID'])->get() as $fund)
                    @php
                    $feed_ = App\Models\Feed::find($fund->feed_id);
                    @endphp
                    <tr class="border-t">
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <p class="truncate">{{$feed_->title}}</p>
                        </td>
                        <td class="">
                            <small>{{$fund->created_at->format('d F, Y h:i a')}}</small>
                        </td>
                        <td class="text-right">
                            LKR {{number_format($fund->amount, 2)}}
                            <br />
                            <small>
                                <strong class="text-red-600">
                                    (- LKR {{number_format(($fund->amount * 0.05), 2)}})
                                </strong>
                            </small>
                        </td>
                        <td class="text-center">
                            @if($fund->status == 'COMPLETED')
                                <span>pending</span>
                            @else
                                <span>paid</span>
                            @endif
                        </td>
                        <td>
                            {{$fund->admin_reference ?? 'N/A'}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Fund Transactions found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection