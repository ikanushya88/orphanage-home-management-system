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
                    <h1> {{$home->name}} </h1>
                    <p> Joined with us on {{$home->created_at->format('M d, Y')}}</p>
                </div>
                @if(auth()->user()->homes()->where('home_id', $home->getKey())->count())

                <div class="flex items-center space-x-4">
                    @switch(auth()->user()->homes()->where('home_id', $home->getKey())->value('home_user.status'))
                        @case('approved')

                            <a href="#" class="flex items-center justify-center h-9 px-5 rounded-md bg-green-600 text-white  space-x-1.5">
                                <ion-icon name="people-circle-outline" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Manage </span>
                            </a>

                            <a href="#" class="flex items-center justify-center h-9 px-5 rounded-md bg-blue-600 text-white  space-x-1.5">
                                <ion-icon name="create-outline" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Edit Home </span>
                            </a>

                            @break
                        @case('invited')

                            <a href="#" class="flex items-center justify-center h-9 px-5 rounded-md bg-green-600 text-white  space-x-1.5">
                                <ion-icon name="thumbs-up" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Accept Invitation </span>
                            </a>

                            <a href="#" class="flex items-center justify-center h-9 px-5 rounded-md bg-red-600 text-white  space-x-1.5">
                                <ion-icon name="thumbs-down" role="img" class="md hydrated" aria-label="thumbs up"></ion-icon>
                                <span> Reject Invitation </span>
                            </a>

                            @break
                        @default

                            <div>{{auth()->user()->homes()->where('home_id', $home->getKey())->value('home_user.status')}}</div>

                    @endswitch
                </div>
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
                <livewire:normal-feed>

                @forelse(App\Models\Feed::where('home_id', $home->id)->latest()->paginate(10) as $feed)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                
                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            @if($feed->home_id)
                            <a href="/h/{{$feed->home()->slug}}">
                                <img src="{{$feed->home()->logo}}" class="bg-gray-200 border border-white rounded-full w-10 h-10">
                            </a>
                            @else
                            <a href="javascript:void(0)">
                                <img src="{{$feed->user()->profile_picture_url}}"
                                    class="bg-gray-200 border border-white rounded-full w-10 h-10">
                            </a>
                            @endif
                            @if($feed->home_id)
                            <div class="flex-1 font-semibold capitalize">
                                <a href="/h/{{$feed->home()->slug}}" class="text-black dark:text-gray-100"> {{$feed->home()->name}} </a>
                                <div class="text-gray-700 flex items-center space-x-2"> 5 <span> hrs </span>
                                    <ion-icon name="people"></ion-icon>
                                </div>
                            </div>
                            @else
                            <div class="flex-1 font-semibold capitalize">
                                <a href="javascript:void(0)" class="text-black dark:text-gray-100"> {{$feed->user()->name}} </a>
                                <div class="text-gray-700 flex items-center space-x-2"> 5 <span> hrs </span>
                                    <ion-icon name="people"></ion-icon>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div>
                            <a href="#"> <i
                                    class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">
                                @if(auth()->user()->id == $feed->user_id)
                                <ul class="space-y-1">
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="uil-share-alt mr-1"></i> Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="uil-edit-alt mr-1"></i> Edit Post
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="uil-comment-slash mr-1"></i> Disable comments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                            <i class="uil-favorite mr-1"></i> Add favorites
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="-mx-2 my-2 dark:border-gray-800">
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                            <i class="uil-trash-alt mr-1"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                
                    <div uk-lightbox>
                        <a href="{{$feed->cover_image}}">
                            <img src="{{$feed->cover_image}}" alt="" class="max-h-96 w-full object-cover">
                        </a>
                    </div>
                
                
                    <div class="p-4 space-y-3">
                
                        <div class="flex space-x-4 lg:font-bold">
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22"
                                        height="22" class="dark:text-gray-100">
                                        <path
                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> Clap</div>
                            </a>
                            {{-- <a href="#" class="flex items-center space-x-2">
                                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                                        width="22" height="22" class="dark:text-gray-100">
                                                        <path fill-rule="evenodd"
                                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div> Comment</div>
                                            </a> --}}
                            <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22"
                                        height="22" class="dark:text-gray-100">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div> Share</div>
                            </a>
                        </div>
                        {{-- <div class="flex items-center space-x-3 pt-2">
                                            <div class="flex items-center">
                                                <img src="/template/images/avatars/avatar-1.jpg" alt=""
                                                    class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900">
                                                <img src="/template/images/avatars/avatar-4.jpg" alt=""
                                                    class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                                <img src="/template/images/avatars/avatar-2.jpg" alt=""
                                                    class="w-6 h-6 rounded-full border-2 border-white dark:border-gray-900 -ml-2">
                                            </div>
                                            <div class="dark:text-gray-100">
                                                Liked <strong> Johnson</strong> and <strong> 209 Others </strong>
                                            </div>
                                        </div> --}}
                
                    </div>
                
                </div>
                @empty
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">
                
                    <!-- post header-->
                    <div class="flex justify-center p-5">
                        <div class="animation-ctn">
                            <div class="icon icon--order-success svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="154px" height="154px">
                                    <g fill="none" stroke="#22AE73" stroke-width="2">
                                        <circle cx="77" cy="77" r="72" style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;">
                                        </circle>
                                        <circle id="colored" fill="#22AE73" cx="77" cy="77" r="72"
                                            style="stroke-dasharray:480px, 480px; stroke-dashoffset: 960px;"></circle>
                                        <polyline class="st0" stroke="#fff" stroke-width="10" points="43.5,77.8 63.7,97.9 112.2,49.4 "
                                            style="stroke-dasharray:100px, 100px; stroke-dashoffset: 200px;" />
                                    </g>
                                </svg>
                                <p class="text-center font-bold text-2xl">All Caught Up</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse

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