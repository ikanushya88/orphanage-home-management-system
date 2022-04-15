@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">
        <div>
            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> LightHouse Management </h2>
                </div>
                <button type="button"
                    class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0" onclick="addingAdmin()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="md:block hidden"> Add Admin </span>
                </button>
            </div>
            <hr />
            <table class="table w-full mt-3">
                <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 50%">Admin</th>
                        <th style="width: 35%" >Permission</th>
                        <th style="width: 10%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (App\Models\User::whereNotNull('current_team_id')->get() as $user)
                    <tr class="border-t" id="row{{$user->id}}">
                        <td>ADM{{$loop->iteration}}</td>
                        <td>
                            <div class="flex items-center">
                                <img src="{{$user->profile_photo_url}}" alt="" class="h-9 w-9 rounded-full" />
                                <div class="ml-2">
                                    <p class="truncate leading-none">{{$user->name}}</p>
                                    <p class="truncate leading-none"><small><strong>{{$user->email}}</strong></small></p>
                                </div>
                            </div>
                        </td>
                        <td class="">
                            @if($user->current_team_id == 1)
                            SUPER ADMIN
                            @elseif($user->current_team_id == 2)
                            ACCOUNTANT
                            @elseif($user->current_team_id == 3)
                            MANAGER
                            @elseif($user->current_team_id == 4)
                            HUMAR RESOURCE ADMIN
                            @elseif($user->current_team_id == 5)
                            CHILD SECURITY ADMIN
                            @endif
                        </td>
                        <td class="text-center">
                            @if($user->id != auth()->id())
                            <button class="px-2 py-1 rounded bg-red-600 text-white"
                                onclick="removeAdmin('{{$user->name}}', {{$user->id}})">
                                <strong><small>REMOVE</small></strong>
                            </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">No Admins found!</td>
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
    let removeAdmin = (name, id) => {
        $.alert({
            title: 'Do you want to remove '+name,
            content: 'you can still able to add '+name+' as admin in future',
            buttons: {
                cancel: function () { },
                somethingElse: {
                    text: 'REMOVE',
                    btnClass: 'btn-red',
                    action: function(){
                        $.ajax({
                            type: "delete",
                            url: "/admin/detach-admin",
                            data: {
                                _token: '{{csrf_token()}}',
                                id: id,
                            },
                            success: function (response) {
                                $('#row'+id).remove();
                            }
                        });
                    }
                }
            }
        });
    }

    let addingAdmin = () => {
        html = `<div>
            <div class="line">
                <input class="line__input" id="email" name="email" type="email"
                    onkeyup="this.setAttribute('value', this.value);" value="" autocomplete="off">
                <span for="username" class="line__placeholder"> Admin Email Address </span>
            </div>
        </div>
        <div>
            <div class="bg-white rounded-md shadow py-4 px-6 max-w-md">
                <div class="text-lg font-semibold mb-3"> Permission </div>
                <div class="radio">
                    <input id="radio-1" name="permission" value="1" type="radio" checked="" />
                    <label for="radio-1"><span class="radio-label"></span> SUPER ADMIN</label>
                </div>
                <br>
                <div class="radio">
                    <input id="radio-2" name="permission" value="2" type="radio" />
                    <label for="radio-2"><span class="radio-label"></span> ACCOUNTANT</label>
                </div>
                <br>
                <div class="radio">
                    <input id="radio-3" name="permission" value="3" type="radio" />
                    <label for="radio-3"><span class="radio-label"></span> MANAGER</label>
                </div>
                <br>
                <div class="radio">
                    <input id="radio-4" name="permission" value="4" type="radio" />
                    <label for="radio-4"><span class="radio-label"></span> HUMAR RESOURCE ADMIN</label>
                </div>
                <br>
                <div class="radio">
                    <input id="radio-5" name="permission" value="5" type="radio" />
                    <label for="radio-5"><span class="radio-label"></span> CHILD SECURITY ADMIN</label>
                </div>
            </div>
        </div>`;
        $.confirm({
            title: 'Add admin',
            content: html,
            buttons: {
                cancel: function () { },
                somethingElse: {
                    text: 'ADD ADMIN',
                    btnClass: 'btn-green',
                    action: function(){
                        let email = $('#email').val();
                        let permission = $('input[name="permission"]').val();

                        if (!email) {
                            $.dialog('Enter email address');
                            return false;
                        }
                        $.ajax({
                            type: "post",
                            url: "/admin/attach-admin",
                            data: {
                                _token: '{{csrf_token()}}',
                                email: email,
                                permission: permission,
                            },
                            success: function (response) {
                                if (response.code == 401) {
                                    $.alert(response.message);
                                } else {
                                    location.reload();
                                }
                            }
                        });
                        return false;
                    }
                }
            }
        });
    }
</script>
@endsection