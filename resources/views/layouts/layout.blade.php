<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link href="/logo.png" rel="icon" type="image/png">

        <!-- Basic Page Needs
        ================================================== -->
        <title>Children's LightHouse</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="LightHouse is - Professional A unique and beautiful collection of UI elements">

        <!-- icons
    ================================================== -->
        <link rel="stylesheet" href="/template/css/icons.css">

        <!-- CSS 
    ================================================== -->
        <link rel="stylesheet" href="/template/css/uikit.css">
        <link rel="stylesheet" href="/template/css/style.css">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        @livewireStyles
        
    </head>

    <body>


        <div id="wrapper">

            <!-- Header -->
            @include('layouts.top-bar')

            <!-- sidebar -->
            @include('layouts.sidebar')

            <!-- Main Contents -->
            @yield('content')

        </div>

        <!-- birthdays modal -->
        <div id="birthdays" uk-modal>
            <div class="uk-modal-dialog uk-modal-body rounded-xl shadow-lg">
                <!-- close button -->
                <button class="uk-modal-close-default p-2.5 bg-gray-100 rounded-full m-3" type="button"
                    uk-close></button>

                <div class="flex items-center space-x-3 mb-10">
                    <ion-icon name="gift" class="text-yellow-500 text-xl bg-yellow-50 p-1 rounded-md"></ion-icon>
                    <div class="text-xl font-semibold"> Today's birthdays </div>
                </div>

                <div class="space-y-6">
                    <div class="sm:space-y-8 space-y-6 pb-2">

                        <div class="flex items-center sm:space-x-6 space-x-3">
                            <img src="/template/images/avatars/avatar-3.jpg" alt=""
                                class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-base font-semibold"> <a href="#"> Alex Dolgove </a> </div>
                                    <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                                </div>
                                <div class="relative">
                                    <input type="text" name="" id="" class="with-border"
                                        placeholder="Write her on Timeline">
                                    <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center sm:space-x-6 space-x-3">
                            <img src="/template/images/avatars/avatar-2.jpg" alt=""
                                class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-base font-semibold"> <a href="#"> Stella Johnson </a> </div>
                                    <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                                </div>
                                <div class="relative">
                                    <input type="text" name="" id="" class="with-border"
                                        placeholder="Write her on Timeline">
                                    <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="relative cursor-pointer" uk-toggle="target: #upcoming; animation: uk-animation-fade">
                        <div class="bg-gray-50 rounded-lg px-5 py-4 font-semibold text-base"> Upcoming birthdays </div>
                        <i class="-translate-y-1/2 absolute icon-feather-chevron-up right-4 text-xl top-1/2 transform text-gray-400"
                            id="upcoming" hidden></i>
                        <i class="-translate-y-1/2 absolute icon-feather-chevron-down right-4 text-xl top-1/2 transform text-gray-400"
                            id="upcoming"></i>
                    </div>
                    <div class="mt-5 sm:space-y-8 space-y-6" id="upcoming" hidden>

                        <div class="flex items-center sm:space-x-6 space-x-3">
                            <img src="/template/images/avatars/avatar-6.jpg" alt=""
                                class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-base font-semibold"> <a href="#"> Erica Jones </a> </div>
                                    <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                                </div>
                                <div class="relative">
                                    <input type="text" name="" id="" class="with-border"
                                        placeholder="Write her on Timeline">
                                    <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center sm:space-x-6 space-x-3">
                            <img src="/template/images/avatars/avatar-5.jpg" alt=""
                                class="sm:w-16 sm:h-16 w-14 h-14 rounded-full">
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="text-base font-semibold"> <a href="#"> Dennis Han </a> </div>
                                    <div class="font-medium text-sm text-gray-400"> 19 years old</div>
                                </div>
                                <div class="relative">
                                    <input type="text" name="" id="" class="with-border"
                                        placeholder="Write her on Timeline">
                                    <ion-icon name="happy" class="absolute right-3 text-2xl top-1/4"></ion-icon>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- open chat box -->
        {{-- <div uk-toggle="target: #offcanvas-chat" class="start-chat">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                </path>
            </svg>
        </div> --}}

        <div id="offcanvas-chat" uk-offcanvas="flip: true; overlay: true">
            <div class="uk-offcanvas-bar bg-white p-0 w-full lg:w-80 shadow-2xl">


                <div class="relative pt-5 px-4">

                    <h3 class="text-2xl font-bold mb-2"> Chats </h3>

                    <div class="absolute right-3 top-4 flex items-center space-x-2">

                        <button class="uk-offcanvas-close  px-2 -mt-1 relative rounded-full inset-0 lg:hidden blcok"
                            type="button" uk-close></button>

                        <a href="#" uk-toggle="target: #search;animation: uk-animation-slide-top-small">
                            <ion-icon name="search" class="text-xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                        </a>
                        <a href="#">
                            <ion-icon name="settings-outline" class="text-xl hover:bg-gray-100 p-1 rounded-full">
                            </ion-icon>
                        </a>
                        <a href="#">
                            <ion-icon name="ellipsis-vertical" class="text-xl hover:bg-gray-100 p-1 rounded-full">
                            </ion-icon>
                        </a>
                        <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                            uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small; offset:5">
                            <ul class="space-y-1">
                                <li>
                                    <a href="#"
                                        class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                        <ion-icon name="checkbox-outline" class="pr-2 text-xl"></ion-icon> Mark all as
                                        read
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                        <ion-icon name="settings-outline" class="pr-2 text-xl"></ion-icon> Chat setting
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                        <ion-icon name="notifications-off-outline" class="pr-2 text-lg"></ion-icon>
                                        Disable notifications
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center px-3 py-2 hover:bg-gray-100 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                        <ion-icon name="star-outline" class="pr-2 text-xl"></ion-icon> Create a group
                                        chat
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </div>


                </div>

                <div class="absolute bg-white z-10 w-full -mt-5 lg:-mt-2 transform translate-y-1.5 py-2 border-b items-center flex"
                    id="search" hidden>
                    <input type="text" placeholder="Search.." class="flex-1">
                    <ion-icon name="close-outline"
                        class="text-2xl hover:bg-gray-100 p-1 rounded-full mr-4 cursor-pointer"
                        uk-toggle="target: #search;animation: uk-animation-slide-top-small"></ion-icon>
                </div>

                <nav class="responsive-nav border-b extanded mb-2 -mt-2">
                    <ul uk-switcher="connect: #chats-tab; animation: uk-animation-fade">
                        <li class="uk-active"><a class="active" href="#0"> Friends </a></li>
                        <li><a href="#0">Groups <span> 10 </span> </a></li>
                    </ul>
                </nav>

                <div class="contact-list px-2 uk-switcher" id="chats-tab">

                    <div class="p-1">
                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-7.jpg" alt="">
                            </div>
                            <div class="contact-username"> Alex Dolgove</div>
                        </a>
                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-8.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>
                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-3.jpg" alt="">
                            </div>
                            <div class="contact-username">Stella Johnson</div>
                        </a>

                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-5.jpg" alt="">
                            </div>
                            <div class="contact-username">Adrian Mohani </div>
                        </a>
                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-6.jpg" alt="">
                            </div>
                            <div class="contact-username"> Jonathan Madano</div>
                        </a>
                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <a href="chats-friend.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-1.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>


                    </div>
                    <div class="p-1">
                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-7.jpg" alt="">
                            </div>
                            <div class="contact-username"> Alex Dolgove</div>
                        </a>
                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-8.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>
                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-3.jpg" alt="">
                            </div>
                            <div class="contact-username">Stella Johnson</div>
                        </a>

                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-5.jpg" alt="">
                            </div>
                            <div class="contact-username">Adrian Mohani </div>
                        </a>
                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-6.jpg" alt="">
                            </div>
                            <div class="contact-username"> Jonathan Madano</div>
                        </a>
                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-2.jpg" alt="">
                                <span class="user_status"></span>
                            </div>
                            <div class="contact-username"> Erica Jones</div>
                        </a>
                        <a href="chats-group.html">
                            <div class="contact-avatar">
                                <img src="/template/images/avatars/avatar-1.jpg" alt="">
                                <span class="user_status status_online"></span>
                            </div>
                            <div class="contact-username"> Dennis Han</div>
                        </a>


                    </div>

                </div>
            </div>
        </div>

        <!-- story-preview -->
        <div class="story-prev">

            <div class="story-sidebar uk-animation-slide-left-medium">
                <div class="md:flex justify-between items-center py-2 hidden">
                    <h3 class="text-2xl font-semibold"> All Story </h3>
                    <a href="#" class="text-blue-600"> Setting</a>
                </div>

                <div class="story-sidebar-scrollbar" data-simplebar>
                    <h3 class="text-lg font-medium"> Your Story </h3>

                    <a class="flex space-x-4 items-center hover:bg-gray-100 md:my-2 py-2 rounded-lg hover:text-gray-700"
                        href="#">
                        <svg class="w-12 h-12 p-3 bg-gray-200 rounded-full text-blue-500 ml-1" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <div class="flex-1">
                            <div class="text-lg font-semibold"> Create a story </div>
                            <div class="text-sm -mt-0.5"> Share a photo or write something. </div>
                        </div>
                    </a>

                    <h3 class="text-lg font-medium lg:mt-3 mt-1"> Friends Story </h3>

                    <div class="story-users-list"
                        uk-switcher="connect: #story_slider ; toggle: > * ; animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium ">

                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-1.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Dennis Han</div>
                                <p> <span class="story-count"> 2 new </span> <span class="story-time"> 4Mn ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-2.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Adrian Mohani</div>
                                <p> <span class="story-count"> 1 new </span> <span class="story-time"> 1hr ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-3.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username">Alex Dolgove </div>
                                <p> <span class="story-count"> 3 new </span> <span class="story-time"> 2hr ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-4.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Stella Johnson </div>
                                <p> <span class="story-count"> 2 new </span> <span class="story-time"> 3hr ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-5.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Adrian Mohani </div>
                                <p> <span class="story-count"> 1 new </span> <span class="story-time"> 4hr ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-8.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Dennis Han</div>
                                <p> <span class="story-count"> 2 new </span> <span class="story-time"> 8Hr ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-6.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Adrian Mohani</div>
                                <p> <span class="story-count"> 1 new </span> <span class="story-time"> 12hr ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-7.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username">Alex Dolgove </div>
                                <p> <span class="story-count"> 3 new </span> <span class="story-time"> 22hr ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-8.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Stella Johnson </div>
                                <p> <span class="story-count"> 2 new </span> <span class="story-time"> 3Dy ago</span>
                                </p>
                            </div>
                        </a>
                        <a href="#">
                            <div class="story-media">
                                <img src="/template/images/avatars/avatar-5.jpg" alt="">
                            </div>
                            <div class="story-text">
                                <div class="story-username"> Adrian Mohani </div>
                                <p> <span class="story-count"> 1 new </span> <span class="story-time"> 4Dy ago</span>
                                </p>
                            </div>
                        </a>


                    </div>


                </div>

            </div>
            <div class="story-content">

                <ul class="uk-switcher uk-animation-scale-up" id="story_slider">
                    <li class="relative">

                        <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                        <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                        <div uk-lightbox>
                            <a href="/template/images/avatars/avatar-lg-2.jpg" data-alt="Image">
                                <img src="/template/images/avatars/avatar-lg-2.jpg" class="story-slider-image"
                                    data-alt="Image">
                            </a>
                        </div>

                    </li>
                    <li class="relative">

                        <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                        <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                        <div uk-lightbox>
                            <a href="/template/images/avatars/avatar-lg-1.jpg" data-alt="Image">
                                <img src="/template/images/avatars/avatar-lg-1.jpg" class="story-slider-image"
                                    data-alt="Image">
                            </a>
                        </div>

                    </li>
                    <li class="relative">

                        <span uk-switcher-item="previous" class="slider-icon is-left"> </span>
                        <span uk-switcher-item="next" class="slider-icon is-right"> </span>

                        <div uk-lightbox>
                            <a href="/template/images/avatars/avatar-lg-4.jpg" data-alt="Image">
                                <img src="/template/images/avatars/avatar-lg-4.jpg" class="story-slider-image"
                                    data-alt="Image">
                            </a>
                        </div>

                    </li>

                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                    <li class="relative">
                        <div class="bg-gray-200 story-slider-placeholder shadow-none animate-pulse"> </div>
                    </li>
                </ul>

            </div>

            <!-- story colose button-->
            <span class="story-btn-close" uk-toggle="target: body ; cls: story-active"
                uk-tooltip="title:Close story ; pos: left">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </span>

        </div>

        

        

        <!-- For Night mode -->
        <script>
        // (function (window, document, undefined) {
        //     'use strict';
        //     var nightMode = localStorage.getItem('gmtNightMode');
        //     if (nightMode == true) {
        //         document.documentElement.className += ' night-mode';
        //         localStorage.setItem('gmtNightMode', true);
        //     } else {
        //         localStorage.setItem('gmtNightMode', false);
        //     }
        // })(window, document);
    
        // (function (window, document, undefined) {
        //     'use strict';
        //     var nightMode = document.querySelector('#night-mode');
        //     if (!nightMode) return;
        //     // When clicked, toggle night mode on or off
        //     nightMode.addEventListener('click', function (event) {
        //         event.preventDefault();
        //         document.documentElement.classList.toggle('dark');
        //         if (document.documentElement.classList.contains('dark')) {
        //             localStorage.setItem('gmtNightMode', true);
        //             return;
        //         }
        //         localStorage.setItem('gmtNightMode', false);
        //     }, false);
    
        // })(window, document);
        </script>

        <!-- Javascript
    ================================================== -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="/template/js/tippy.all.min.js"></script>
        <script src="/template/js/uikit.js"></script>
        <script src="/template/js/simplebar.js"></script>
        <script src="/template/js/custom.js"></script>
        <script src="/template/js/bootstrap-select.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
        <script src="/js/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="/css/sweetalert2.min.css" />

        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />

        <style>
            .dt-button {
            display: inline-block;
            font-weight: 400;
            color: #212529;
            text-align: center;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid lightgray;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s
            ease-in-out;
            }
        </style>

        <script>
            function __toast(type, message) {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
                });
                Toast.fire({
                    type: type,
                    title: message
                });
            }
            $(document).ready(function () {
                @error('success')
                __toast('success', '{{$message}}');
                @enderror
                @error('error')
                __toast('error', '{{$message}}');
                @enderror

                var nightMode = localStorage.getItem('gmtNightMode');

                $('.dt-table').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'copy', 'csv', 'excel' ]
                });

                // if (nightMode) {
                //     $(html).addClass('dark');
                // }

                // $('#night-mode').click(function (e) {
                //     e.preventDefault();
                //     if ($(html).hasClass(dark)) {
                //         $(html).removeClass('dark');
                //         localStorage.setItem('gmtNightMode', false);                            
                //     } else {
                //         $(html).addClass('dark');
                //         localStorage.setItem('gmtNightMode', true);                                
                //     }
                    
                // });
            });

            function deleteFeed(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value === true) {
                        location.replace('/f/delete/'+id);
                    }
                });
            }

            function viewAdmin(photo, name, admin, page) {
                if (admin == {{auth()->id()}}) {
                    return false;
                }
                Swal.fire({
                    title: `<img src="${photo}" class="w-24 h-24 rounded-full" />`,
                    text: ` ${name}`,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: 'lightgrey',
                    confirmButtonText: 'Remove Admin'
                }).then((result) => {
                    if (result.value === true) {
                        location.replace(`/admin/${admin}/delete/${page}`);
                    }
                });
            }

            async function addAdmin(home) {
                const { value: email } = await Swal.fire({
                    title: 'Input admin email address',
                    input: 'email',
                    inputLabel: 'admin email address',
                    inputPlaceholder: "Enter admin's email address"
                })
                
                if (email) {
                    location.replace(`/admin/${email}/add/${home}`);
                }
            }
        </script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        
        <script>
            const showDetailComplaint = (title, content, btn = false) => {
                if (btn) {
                    $.alert({
                        title: title,
                        content: content,
                        buttons: {
                            formSubmit: {
                                text: 'Add Followup',
                                btnClass: 'btn-blue',
                                action: function () {
                                    insertNewFollowup(btn);
                                }
                            },
                            cancel: function () {
                                //close
                            },
                        },
                    });
                } else {
                    $.alert({
                        title: title,
                        content: content,
                    });
                }
            }

            const markAsReadAll = () => {
                $.get('/mark-as-read-all')
                .done(() => {
                    location.reload();
                })
            }
        </script>

        @stack('modals')
        @livewireScripts

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        @yield('scripts')
    </body>

</html>