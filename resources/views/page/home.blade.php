@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">

        <div class="profile is_group">

            <div class="profiles_banner">
                <img src="{{\Storage::url($home->cover_photo)}}" alt="">
            </div>
            <div class="profiles_content">
                <div class="profile_avatar">
                    <div class="profile_avatar_holder">
                        <img src="{{\Storage::url($home->logo)}}" alt="">
                    </div>
                    <div class="icon_change_photo" hidden="">
                        <ion-icon name="camera" class="text-xl md hydrated" role="img" aria-label="camera"></ion-icon>
                    </div>
                </div>
                <div class="profile_info">
                    <h1 class="flex items-center gap-2">
                        {{$home->name}}
                        @if($home->verified_by)
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                        @endif
                    </h1>
                    <p> Joined with us on {{$home->created_at->format('M d, Y')}}</p>
                </div>
                @if(auth()->user()->homes()->where('home_id', $home->getKey())->whereIn('home_user.status', ['approved', 'rejected', 'invited'])->count())

                <div class="flex items-center space-x-4">
                    <div class="flex items-center -space-x-4">
                        @foreach($home->users()->get() as $admin)
                        <a href="javascript:void(0)" class="w-10 h-10 rounded-full border-2 border-white" onclick="viewAdmin('{{$admin->profile_photo_url}}', '{{$admin->name}}', '{{$admin->id}}', '{{$home->id}}')">
                            <img src="{{$admin->profile_photo_url}}" alt="" class="rounded-full" />
                        </a>
                        @endforeach
                        <a href="javascript:void(0)" class="w-10 h-10 rounded-full flex justify-center items-center bg-red-100 text-red-500 font-semibold" onclick="addAdmin('{{$home->id}}')">ADD</a>
                    </div>
                    @switch(auth()->user()->homes()->where('home_id', $home->getKey())->value('home_user.status'))
                        @case('approved')

                            <a href="#" class="flex items-center justify-center h-9 px-5 rounded-md bg-green-600 text-white  space-x-1.5">
                                <ion-icon name="people-circle-outline" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Manage </span>
                            </a>

                            <a href="/edit/h/{{$home->slug}}" class="flex items-center justify-center h-9 px-5 rounded-md bg-blue-600 text-white  space-x-1.5">
                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Edit Home </span>
                            </a>

                            @break
                        @case('invited')

                            <a href="/accept-invitation/{{$home->id}}" class="flex items-center justify-center h-9 px-5 rounded-md bg-green-600 text-white  space-x-1.5">
                                <ion-icon name="thumbs-up" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Accept </span> <span class="hidden md:block">Invitation</span>
                            </a>

                            <a href="/reject-invitation/{{$home->id}}" class="flex items-center justify-center h-9 px-5 rounded-md bg-red-600 text-white  space-x-1.5">
                                <ion-icon name="thumbs-down" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Reject  </span><span class="hidden md:block">Invitation</span>
                            </a>

                            @break
                        @default
                            <small>{{auth()->user()->homes()->where('home_id', $home->getKey())->value('home_user.status')}}</small>
                    @endswitch
                </div>
                @else
                @foreach($home->users()->where('home_id', $home->getKey())->whereIn('home_user.status', ['approved', 'rejected', 'invited'])->get() as $admin)
                <img src="{{$admin->profile_photo_url}}" alt="" class="w-10 h-10 rounded-full border-2 border-white" title="{{$admin->name}}" />
                @endforeach
                @endif
            </div>

            {{-- <nav class="responsive-nav border-t -mb-0.5 lg:pl-3.5">
                <ul>
                    <li class="active"><a href="#0"> Home</a></li>
                    <li><a href="#0">About</a></li>
                    <li><a href="#0">Photos</a></li>
                    <li><a href="#0">Reviews</a></li>
                    <li><a href="#0">Discussion</a></li>
                    <li><a href="#0">Videos</a></li>
                    <li><a href="#0">About</a></li>
                </ul>
            </nav> --}}

            <!-- search icon -->
        </div>

        <div class="md:flex md:space-x-6 lg:mx-16">
            <div class="space-y-5 flex-shrink-0 md:w-7/12">

                <!-- create post  -->
                {{-- <livewire:normal-feed> --}}
                @if(auth()->user()->homes()->where('home_id', $home->getKey())->whereIn('home_user.status', ['approved'])->count())
                <livewire:normal-feed>
                @endif
                <livewire:feeder-block :home="$home->getKey()" :onlyFundraise="'0'" />
            </div>
            <div class="w-full flex-shirink-0">

                <div class="card p-4 mb-5">

                    <h1 class="block text-lg font-bold"> About </h1>

                    <div class="space-y-4 mt-3">
                        <div class="flex items-center space-x-3">
                            <div class="flex-1">
                                <div class="font-semibold text-justify">{{$home->about}}</div>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <ion-icon name="globe-outline" class="bg-gray-100 p-2 rounded-full text-2xl md hydrated"
                                role="img" aria-label="people"></ion-icon>
                            <div class="flex-1">
                                <div class="font-bold"> Location </div>
                                <div> {{$home->address}} </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <ion-icon name="call" class="bg-gray-100 p-1.5 rounded-full text-xl md hydrated"
                                role="img" aria-label="unlink"></ion-icon>
                            <div class="flex-1">
                                <div> <a href="#" class="text-blue-500"> {{$home->contact_number}} </a> </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <ion-icon name="mail-open" class="bg-gray-100 p-1.5 rounded-full text-xl md hydrated"
                                role="img" aria-label="mail open"></ion-icon>
                            <div class="flex-1">
                                <div> <a href="#" class="text-blue-500">{{$home->email}}</a> </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
@endsection