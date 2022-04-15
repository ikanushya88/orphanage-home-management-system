@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div>
            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> Fundraise Approval </h2>
                </div>
            </div>
            <hr />
            <div class="relative grid grid-cols-1 md:grid-cols-4 gap-3 mt-3">
                @forelse (App\Models\Feed::where('type', 'fundraise')->whereNull('approved_at')->whereStatus('ACTIVE')->get() as $feed)
                <div class="card">
                    <div class="card-media h-28">
                        <div class="card-media-overly"></div>
                        <img src="{{\Storage::url($feed->cover_photo)}}" alt="" class="">
                    </div>
                    <div class="card-body">
                        <p class="font-semibold text-lg truncate">{{$feed->title}}</p>
                        <div class="flex items-center flex-wrap space-x-1 mt-1 text-sm text-gray-500 capitalize line-clamp-3 truncate">
                            {{$feed->content}}
                        </div>
                
                        <div class="flex mt-3.5 space-x-2 text-sm font-medium">
                            <a href="{{$feed->slug}}" target="_blank"
                                class="bg-blue-600 flex flex-1 h-8 items-center justify-center rounded-md text-white capitalize">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <button type="button" onclick="approveFeed({{$feed->id}}, '{{$feed->title}}')"
                                class="flex items-center justify-center h-8 w-8 rounded-md bg-green-600 text-white space-x-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                            <button type="button" onclick="rejectFeed({{$feed->id}})"
                                class="flex items-center justify-center h-8 w-8 rounded-md bg-red-600 text-white space-x-1.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </button>
                        </div>
                
                    </div>
                </div>
                @empty
                No Fundraise posts found!
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let approveFeed = (id, name) => {
        $.confirm({
            title: 'Approve',
            content: 'Approve feed : '+name,
            buttons: {
                formSubmit: {
                    text: 'Approve',
                    btnClass: 'btn-green',
                    action: function () {
                        $.ajax({
                            type: "post",
                            url: "/admin/approval/feed",
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
    let rejectFeed = id => {
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
                            url: "/admin/reject/feed",
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