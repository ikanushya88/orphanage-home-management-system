@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div>
            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> Complaint Management </h2>
                </div>
                {{-- <button type="button"
                    class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0"
                    onclick="addingAdmin()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="md:block hidden"> Add Admin </span>
                </button> --}}
            </div>
            <hr />
            <div>
                <table class="table w-full mt-3">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 80%">Description</th>
                            <th style="width: 15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Models\Complaint::all() as $complaint)
                        <tr class="border-t">
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <strong>{{$complaint->title}} @ {{$complaint->created_at->format('d F Y h:i a')}}</strong>
                                <br />
                                <p>{{$complaint->complaint}}</p>
                            </td>
                            <td>
                                <div class="flex items-center gap-3">
                                    <select id="select{{$complaint->id}}" onchange="changeStatus({{$complaint->id}})">
                                        <option value="waiting" @if($complaint->status == 'waiting') selected @endif disabled>Waiting</option>
                                        <option value="in progress" @if($complaint->status == 'in progress') selected @endif>In progress</option>
                                        <option value="completed" @if($complaint->status == 'completed') selected @endif>Completed</option>
                                        <option value="on hold" @if($complaint->status == 'on hold') selected @endif>On hold</option>
                                    </select>
                                    {{-- <div>{{$complaint->status}}</div> --}}
                                    @if($complaint->status !== 'waiting')
                                    @php
                                    $complaintTitle = 'C/B:'.App\Models\User::find($complaint->user_id)->name.'<small>
                                        ('.$complaint->status.')</small>';
                                    $detailComplaint = '';
                                    foreach (App\Models\FollowUp::where('complaint_id', $complaint->id)->get() as $followup) {
                                    $detailComplaint .=
                                    '<small>'.$followup->description.'<br /><strong>by '.App\Models\User::find($followup->user_id)->name.'
                                            @ '.$followup->created_at->format('d F \'y h:i a').'</strong></small>
                                    <hr />';
                                    }
                                    @endphp
                                    <button type="button"
                                        onclick="showDetailComplaint('{{json_encode($complaintTitle)}}', `{{$detailComplaint}}`, {{$complaint->id}})" class="flex items-center justify-center h-6 w-6 rounded-md bg-blue-600 text-white space-x-1.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">No Complaints found!</td>
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
    let changeStatus = id => {
        let value = $('#select'+id).val();
        $.confirm({
            title: 'Add a followup note',
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Enter follow up note here</label>' +
            '<textarea type="text" placeholder="Your note" class="name form-control" required rows="5" ></textarea>' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function () {
                        var name = this.$content.find('.name').val();
                        if(!name){
                            $.alert('provide a valid note');
                            return false;
                        }
                        complaintUpdate(
                            id,
                            {status:value, note:name}
                        )
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
    let insertNewFollowup = id => {
        $.confirm({
            title: 'Add a followup note',
            content: '' +
            '<form action="" class="formName">' +
            '<div class="form-group">' +
            '<label>Enter follow up note here</label>' +
            '<textarea type="text" placeholder="Your note" class="name form-control" required rows="5" ></textarea>' +
            '</div>' +
            '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-blue',
                    action: function () {
                        var name = this.$content.find('.name').val();
                        if(!name){
                            $.alert('provide a valid note');
                            return false;
                        }
                        complaintUpdate(
                            id,
                            {note:name}
                        )
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
    let complaintUpdate = (id, data) => {
        $.ajax({
            type: "put",
            url: "/admin/complaint-updates",
            data: {
                _token: '{{csrf_token()}}',
                id: id,
                ...data
            },
            success: function (response) {
                location.reload();
            }
        });
    }
</script>
@endsection