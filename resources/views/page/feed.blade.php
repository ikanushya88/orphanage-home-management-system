@extends('layouts.layout')
@section('content')
<div class="main_content">
    <div class="mcontainer">

        <!--  Feeds  -->
        <div class="lg:flex lg:space-x-10">
            <div class="lg:w-3/4 lg:px-20 space-y-7">

                <!-- user story -->
                {{-- <div class="user_story grid md:grid-cols-5 grid-cols-3 gap-2 lg:-mx-20 relative">

                    <a href="#create-post" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="/template/images/avatars/avatar-lg-1.jpg" alt="">
                            <div class="story-avatar"> <img src="/template/images/avatars/avatar-6.jpg" alt=""></div>
                            <div class="story-content">
                                <h4>Erica Jones </h4>
                            </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="/template/images/avatars/avatar-lg-2.jpg" alt="">
                            <div class="story-avatar"> <img src="/template/images/avatars/avatar-2.jpg" alt=""></div>
                            <div class="story-content">
                                <h4> Dennis Han</h4>
                            </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="/template/images/avatars/avatar-lg-3.jpg" alt="">
                            <div class="story-avatar"> <img src="/template/images/avatars/avatar-3.jpg" alt=""></div>
                            <div class="story-content">
                                <h4> Alex Mohani</h4>
                            </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="/template/images/avatars/avatar-lg-4.jpg" alt="">
                            <div class="story-avatar"> <img src="/template/images/avatars/avatar-4.jpg" alt=""></div>
                            <div class="story-content">
                                <h4> Jonathan </h4>
                            </div>
                        </div>
                    </a>
                    <a href="#" uk-toggle="target: body ; cls: story-active">
                        <div class="single_story">
                            <img src="/template/images/avatars/avatar-lg-5.jpg" alt="">
                            <div class="story-avatar"> <img src="/template/images/avatars/avatar-5.jpg" alt=""></div>
                            <div class="story-content">
                                <h4> Stella Johnson</h4>
                            </div>
                        </div>
                    </a>

                    <span class="absolute bg-white lg:flex items-center justify-center p-2 rounded-full 
                            shadow-md text-xl w-9 z-10 uk-position-center-right -mr-4 hidden"
                        uk-toggle="target: body ; cls: story-active">
                        <i class="icon-feather-chevron-right"></i></span>

                </div> --}}

                <!-- create post -->
                <livewire:normal-feed>

                @forelse(App\Models\Feed::latest()->paginate(10) as $feed)
                <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            @if($feed->home_id)
                            <a href="/h/{{$feed->home()->slug}}">
                                <img src="{{$feed->home()->logo}}"
                                    class="bg-gray-200 border border-white rounded-full w-10 h-10">
                            </a>
                            @else 
                            <a href="javascript:void(0)">
                                <img src="{{$feed->user()->profile_picture_url}}" class="bg-gray-200 border border-white rounded-full w-10 h-10">
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
                            <img src="{{$feed->cover_image}}" alt=""
                                class="max-h-96 w-full object-cover">
                        </a>
                    </div>


                    <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
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

                {{-- <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="/template/images/avatars/avatar-2.jpg"
                                    class="bg-gray-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="#" class="text-black dark:text-gray-100"> Johnson smith </a>
                                <div class="text-gray-700 flex items-center space-x-2"> 5 <span> hrs </span>
                                    <ion-icon name="people"></ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i
                                    class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

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

                            </div>
                        </div>
                    </div>


                    <div uk-lightbox>
                        <div class="grid grid-cols-2 gap-2 px-5">

                            <a href="/template/images/post/img-4.jpg" class="col-span-2">
                                <img src="/template/images/post/img-4.jpg" alt=""
                                    class="rounded-md w-full lg:h-76 object-cover">
                            </a>
                            <a href="/template/images/post/img-4.jpg">
                                <img src="/template/images/post/img-2.jpg" alt="" class="rounded-md w-full h-full">
                            </a>
                            <a href="/template/images/post/img-4.jpg" class="relative">
                                <img src="/template/images/post/img-3.jpg" alt="" class="rounded-md w-full h-full">
                                <div
                                    class="absolute bg-gray-900 bg-opacity-30 flex justify-center items-center text-white rounded-md inset-0 text-2xl">
                                    + 15 more </div>
                            </a>

                        </div>
                    </div>

                    <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path
                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> Like</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path fill-rule="evenodd"
                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div> Comment</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div> Share</div>
                            </a>
                        </div>
                        <div class="flex items-center space-x-3 pt-2">
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
                        </div>

                        <div class="border-t py-4 space-y-4 dark:border-gray-600">
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="/template/images/avatars/avatar-1.jpg" alt=""
                                        class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div
                                        class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6">In ut odio libero vulputate <urna class="i uil-heart">
                                            </urna> <i class="uil-grin-tongue-wink">
                                            </i> </p>
                                        <div
                                            class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800">
                                        </div>
                                    </div>
                                    <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                        </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="/template/images/avatars/avatar-1.jpg" alt=""
                                        class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div
                                        class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut
                                            laoreet dolore magna aliquam erat volutpat. David !<i
                                                class="uil-grin-tongue-wink-alt"></i> </p>
                                        <div
                                            class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800">
                                        </div>
                                    </div>
                                    <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                        </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="hover:text-blue-600 hover:underline"> Veiw 8 more Comments </a>

                        <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                            <input placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none px-5">
                            <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                <a href="#">
                                    <ion-icon name="happy-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="image-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="link-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="/template/images/avatars/avatar-2.jpg"
                                    class="bg-gray-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="#" class="text-black dark:text-gray-100"> Johnson smith </a>
                                <div class="text-gray-700 flex items-center space-x-2"> 5 <span> hrs </span>
                                    <ion-icon name="people"></ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i
                                    class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

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

                            </div>
                        </div>
                    </div>


                    <div class="p-5 pt-0 border-b dark:border-gray-700">

                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                        euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
                        minim laoreet dolore magna aliquam erat volutpat

                    </div>


                    <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path
                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> Like</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path fill-rule="evenodd"
                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div> Comment</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div> Share</div>
                            </a>
                        </div>
                        <div class="flex items-center space-x-3 pt-2">
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
                        </div>

                        <div class="border-t py-4 space-y-4 dark:border-gray-600">
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="/template/images/avatars/avatar-1.jpg" alt=""
                                        class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div
                                        class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6">In ut odio libero vulputate <urna class="i uil-heart">
                                            </urna> <i class="uil-grin-tongue-wink">
                                            </i> </p>
                                        <div
                                            class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800">
                                        </div>
                                    </div>
                                    <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                        </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="/template/images/avatars/avatar-1.jpg" alt=""
                                        class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div
                                        class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut
                                            laoreet dolore magna aliquam erat volutpat. David !<i
                                                class="uil-grin-tongue-wink-alt"></i> </p>
                                        <div
                                            class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800">
                                        </div>
                                    </div>
                                    <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                        </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="hover:text-blue-600 hover:underline"> Veiw 8 more Comments </a>

                        <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                            <input placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none px-5">
                            <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                <a href="#">
                                    <ion-icon name="happy-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="image-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="link-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card lg:mx-0 uk-animation-slide-bottom-small">

                    <!-- post header-->
                    <div class="flex justify-between items-center lg:p-4 p-2.5">
                        <div class="flex flex-1 items-center space-x-4">
                            <a href="#">
                                <img src="/template/images/avatars/avatar-2.jpg"
                                    class="bg-gray-200 border border-white rounded-full w-10 h-10">
                            </a>
                            <div class="flex-1 font-semibold capitalize">
                                <a href="#" class="text-black dark:text-gray-100"> Johnson smith </a>
                                <div class="text-gray-700 flex items-center space-x-2"> 5 <span> hrs </span>
                                    <ion-icon name="people"></ion-icon>
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="#"> <i
                                    class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                            </a>
                            <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

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

                            </div>
                        </div>
                    </div>

                    <div class="w-full h-full">
                        <iframe src="https://www.youtube.com/embed/pQN-pnXPaVg" frameborder="0"
                            uk-video="automute: true" allowfullscreen uk-responsive
                            class="w-full lg:h-64 h-40"></iframe>
                    </div>

                    <div class="p-4 space-y-3">

                        <div class="flex space-x-4 lg:font-bold">
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path
                                            d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                    </svg>
                                </div>
                                <div> Like</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path fill-rule="evenodd"
                                            d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div> Comment</div>
                            </a>
                            <a href="#" class="flex items-center space-x-2 flex-1 justify-end">
                                <div class="p-2 rounded-full  text-black lg:bg-gray-100 dark:bg-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        width="22" height="22" class="dark:text-gray-100">
                                        <path
                                            d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
                                    </svg>
                                </div>
                                <div> Share</div>
                            </a>
                        </div>
                        <div class="flex items-center space-x-3 pt-2">
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
                        </div>

                        <div class="border-t py-4 space-y-4 dark:border-gray-600">
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="/template/images/avatars/avatar-1.jpg" alt=""
                                        class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div
                                        class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6">In ut odio libero vulputate <urna class="i uil-heart">
                                            </urna> <i class="uil-grin-tongue-wink">
                                            </i> </p>
                                        <div
                                            class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800">
                                        </div>
                                    </div>
                                    <div class="text-sm flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                        </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                    <img src="/template/images/avatars/avatar-1.jpg" alt=""
                                        class="absolute h-full rounded-full w-full">
                                </div>
                                <div>
                                    <div
                                        class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12 dark:bg-gray-800 dark:text-gray-100">
                                        <p class="leading-6"> sed diam nonummy nibh euismod tincidunt ut
                                            laoreet dolore magna aliquam erat volutpat. David !<i
                                                class="uil-grin-tongue-wink-alt"></i> </p>
                                        <div
                                            class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800">
                                        </div>
                                    </div>
                                    <div class="text-xs flex items-center space-x-3 mt-2 ml-5">
                                        <a href="#" class="text-red-600"> <i class="uil-heart"></i> Love
                                        </a>
                                        <a href="#"> Replay </a>
                                        <span> 3d </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <a href="#" class="hover:text-blue-600 hover:underline"> Veiw 8 more Comments </a>

                        <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                            <input placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none px-5">
                            <div class="-m-0.5 absolute bottom-0 flex items-center right-3 text-xl">
                                <a href="#">
                                    <ion-icon name="happy-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="image-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                                <a href="#">
                                    <ion-icon name="link-outline" class="hover:bg-gray-200 p-1.5 rounded-full">
                                    </ion-icon>
                                </a>
                            </div>
                        </div>

                    </div>

                </div> --}}

                <div class="flex justify-center mt-6">
                    <a href="#"
                        class="bg-white dark:bg-gray-900 font-semibold my-3 px-6 py-2 rounded-full shadow-md dark:bg-gray-800 dark:text-white">
                        Load more ..</a>
                </div>

            </div>
            <div class="lg:w-72 w-full">

                <a href="#birthdays" uk-toggle>
                    <div class="bg-white mb-5 px-4 py-3 rounded-md shadow">
                        <h3 class="text-line-through font-semibold mb-1"> Birthdays </h3>
                        <div class="-mx-2 duration-300 flex hover:bg-gray-50 px-2 py-2 rounded-md">
                            <img src="/template/images/icons/gift-icon.png" class="w-9 h-9 mr-3" alt="">
                            <p class="line-clamp-2 leading-6"> <strong> Jessica Erica </strong> and <strong>
                                    two others </strong>
                                have a birthdays to day .
                            </p>
                        </div>
                    </div>
                </a>

                <h3 class="text-xl font-semibold"> Contacts </h3>

                <div class="" uk-sticky="offset:80">

                    <nav class="responsive-nav border-b extanded mb-2 -mt-2">
                        <ul uk-switcher="connect: #group-details; animation: uk-animation-fade">
                            <li class="uk-active"><a class="active" href="#0"> Friends <span> 310 </span>
                                </a></li>
                            <li><a href="#0">Groups</a></li>
                        </ul>
                    </nav>

                    <div class="contact-list">

                        <a href="#">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-1.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>
                        <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                            <div class="contact-list-box">
                                <div class="contact-avatar">
                                    <img src="/template/images/avatars/avatar-2.jpg" alt="">
                                    <span class="user_status status_online"></span>
                                </div>
                                <div class="contact-username"> Dennis Han</div>
                                <p>
                                    <ion-icon name="people" class="text-lg mr-1"></ion-icon> Become friends
                                    with
                                    <strong> Stella Johnson </strong> and <strong> 14 Others</strong>
                                </p>
                                <div class="contact-list-box-btns">
                                    <button type="button" class="button primary flex-1 block mr-2">
                                        <i class="uil-envelope mr-1"></i> Send message</button>
                                    <button type="button" href="#" class="button secondary button-icon mr-2">
                                        <i class="uil-list-ul"> </i> </button>
                                    <button type="button" a href="#" class="button secondary button-icon">
                                        <i class="uil-ellipsis-h"> </i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <a href="#">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <div uk-drop="pos: left-center ;animation: uk-animation-slide-left-small">
                            <div class="contact-list-box">
                                <div class="contact-avatar">
                                    <img src="/template/images/avatars/avatar-1.jpg" alt="">
                                    <span class="user_status"></span>
                                </div>
                                <div class="contact-username"> Erica Jones </div>
                                <p>
                                    <ion-icon name="people" class="text-lg mr-1"></ion-icon> Become friends
                                    with
                                    <strong> Stella Johnson </strong> and <strong> 14 Others</strong>
                                </p>
                                <div class="contact-list-box-btns">
                                    <button type="button" class="button primary flex-1 block mr-2">
                                        <i class="uil-envelope mr-1"></i> Send message</button>
                                    <button type="button" href="#" class="button secondary button-icon mr-2">
                                        <i class="uil-list-ul"> </i> </button>
                                    <button type="button" a href="#" class="button secondary button-icon">
                                        <i class="uil-ellipsis-h"> </i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-5.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username">Stella Johnson</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-6.jpg" alt="">
                            </div>
                            <div class="contact-username"> Alex Dolgove</div>
                        </a>

                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-1.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-7.jpg" alt="">
                            </div>
                            <div class="contact-username">Stella Johnson</div>
                        </a>
                        <a href="timeline.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-4.jpg" alt="">
                            </div>
                            <div class="contact-username"> Alex Dolgove</div>
                        </a>


                    </div>


                </div>

            </div>
        </div>

    </div>
</div>
@endsection