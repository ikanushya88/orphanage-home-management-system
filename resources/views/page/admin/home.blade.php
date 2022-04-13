@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div>
            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> Home Approval </h2>
                </div>
            </div>
            <hr />
            <div>
                <table class="table w-full mt-3">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 50%">Home</th>
                            <th style="width: 15%">Registered on</th>
                            <th style="width: 15%">Document</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Models\Home::whereNull('verified_by')->whereNotNull('document')->get() as $home)
                        <tr class="border-t">
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <div class="flex items-center">
                                    <img src="{{\Storage::url($home->logo)}}" alt="" class="h-9 w-9 rounded-full" />
                                    <div class="ml-2">
                                        <p class="truncate leading-none">{{$home->name}}</p>
                                        <div class="flex items-center">
                                            @foreach($home->users()->get() as $admin)
                                            <a href="javascript:void(0)" class="w-5 h-5 rounded-full border-2 border-gray-400" >
                                                <img src="{{$admin->profile_photo_url}}" alt="" class="rounded-full" />
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$home->created_at->format('M d, Y')}}</td>
                            <td>
                                <a href="{{\Storage::url($home->document)}}" class="flex items-center justify-center" target="_blank" rel="noopener noreferrer">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                        </svg>
                                    </div>
                                    <div>document</div>
                                </a>
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                <button type="button"
                                    onclick="approveHome({{$home->id}}, '{{$home->name}}')"
                                    class="flex items-center justify-center h-6 w-6 rounded-md bg-green-600 text-white space-x-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                <button type="button" onclick="rejectHome({{$home->id}})"
                                    class="flex items-center justify-center h-6 w-6 rounded-md bg-red-600 text-white space-x-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Home for approval found!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    let approveHome = (id, name) => {
        $.confirm({
            title: 'Approve',
            content: 'Approve home : '+name,
            buttons: {
                formSubmit: {
                    text: 'Approve',
                    btnClass: 'btn-green',
                    action: function () {
                        $.ajax({
                            type: "post",
                            url: "/admin/approval/home",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id,
                            },
                            success: function (response) {
                                location.reload();
                            }
                        });
                    }
                },
                cancel: function () {
                    //close
                },
            }
        });
    }
    let rejectHome = id => {
        $.confirm({
            title: 'Add a note',
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Enter note here</label>' +
            '<textarea type="text" placeholder="Your note" class="name form-control" required rows="5" ></textarea>' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Reject',
                    btnClass: 'btn-red',
                    action: function () {
                        var name = this.$content.find('.name').val();
                        if(!name){
                            $.alert('provide a valid note');
                            return false;
                        }
                        $.ajax({
                            type: "post",
                            url: "/admin/reject/home",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id,
                                note: name
                            },
                            success: function (response) {
                                location.reload();
                            }
                        });
                    }
                },
                cancel: function () {
                    //close
                },
            },
            onContentReady: function () {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function (e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });
    }

</script>
@endsection