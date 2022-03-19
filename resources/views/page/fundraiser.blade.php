@extends('layouts.layout')
@section('content')
    <div class="main_content">
        <div class="mcontainer">
    
            <div class="lg:flex lg:space-x-10">
    
                <div class="lg:w-2/3">
                    <div class="flex justify-between items-center relative md:mb-4 mb-3">
                        <div class="flex-1">
                            <h2 class="text-2xl font-semibold"> Fundings </h2>
                            <nav class="responsive-nav border-b md:m-0 -mx-4">
                                <ul>
                                    <li class="active"><a href="#" class="lg:px-2"> Browse Funding </a></li>
                                    <li><a href="#" class="lg:px-2"> My Funding Requests</a></li>
                                </ul>
                            </nav>
                        </div>
                        <a href="#"
                            class="flex items-center justify-center h-10 w-10 z-10 rounded-full bg-blue-600 text-white absolute right-0"
                            data-tippy-placement="left" data-tippy="" data-original-title="Create New Page">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
    
                    <div class="relative uk-slider" uk-slider="finite: true">
                        <div class="uk-slider-container px-1 py-3">
                            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid"
                                style="transform: translate3d(-209.891px, 0px, 0px);">
    
                                <li tabindex="-1" class="">
                                    <a href="timeline-fundraiser.html" class="uk-link-reset">
                                    </a>
                                    <div class="card"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            <div class="card-media h-28">
                                                <div class="card-media-overly"></div>
                                                <img src="assets/images/funding/funder-4.jpg" alt="" class="">
                                            </div>
                                        </a>
                                        <div class="card-body"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            </a><a href="timeline-fundraiser.html"
                                                class="font-semibold line-clamp-2 mb-2">Naveen's Boston Marathon &amp;
                                                Charles River Marathon </a>
    
                                            <div class="font-medium text-sm text-gray-400 flex items-center">
                                                <i class="icon-feather-trending-up text-base text-blue-500 mr-1.5"> </i>
                                                321 People donated
                                            </div>
    
                                            <div class="mt-4 -m-3.5">
                                                <div class="bg-gray-100 h-2 w-full relative overflow-hidden">
                                                    <div class="bg-blue-600 w-1/3 h-full"></div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <a href="timeline-fundraiser.html" class="uk-link-reset">
                                    </a>
                                    <div class="card"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            <div class="card-media h-28">
                                                <div class="card-media-overly"></div>
                                                <img src="assets/images/funding/funder-3.jpg" alt="" class="">
                                            </div>
                                        </a>
                                        <div class="card-body"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            </a><a href="timeline-fundraiser.html" class="font-semibold line-clamp-2 mb-2">
                                                John's fundraiser for Hug It Forward.</a>
    
                                            <div class="font-medium text-sm text-gray-400 flex items-center">
                                                <i class="icon-feather-trending-up text-base text-blue-500 mr-1.5"> </i>
                                                216 People donated
                                            </div>
    
                                            <div class="mt-4 -m-3.5">
                                                <div class="bg-gray-100 h-2 w-full relative overflow-hidden">
                                                    <div class="bg-blue-600 w-1/3 h-full"></div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <a href="timeline-fundraiser.html" class="uk-link-reset">
                                    </a>
                                    <div class="card"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            <div class="card-media h-28">
                                                <div class="card-media-overly"></div>
                                                <img src="assets/images/funding/funder-2.jpg" alt="" class="">
                                            </div>
                                        </a>
                                        <div class="card-body"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            </a><a href="timeline-fundraiser.html" class="font-semibold line-clamp-2 mb-2">
                                                Striding for a Cure for Cystic Fibrosis </a>
    
                                            <div class="font-medium text-sm text-gray-400 flex items-center">
                                                <i class="icon-feather-trending-up text-base text-blue-500 mr-1.5"> </i>
                                                421 People donated
                                            </div>
    
                                            <div class="mt-4 -m-3.5">
                                                <div class="bg-gray-100 h-2 w-full relative overflow-hidden">
                                                    <div class="bg-blue-600 w-1/3 h-full"></div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </li>
                                <li tabindex="-1" class="uk-active">
                                    <a href="timeline-fundraiser.html" class="uk-link-reset">
                                    </a>
                                    <div class="card"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            <div class="card-media h-28">
                                                <div class="card-media-overly"></div>
                                                <img src="assets/images/funding/funder-4.jpg" alt="" class="">
                                            </div>
                                        </a>
                                        <div class="card-body"><a href="timeline-fundraiser.html" class="uk-link-reset">
                                            </a><a href="timeline-fundraiser.html"
                                                class="font-semibold line-clamp-2 mb-2">Naveen's Boston Marathon &amp;
                                                Charles River Marathon </a>
    
                                            <div class="font-medium text-sm text-gray-400 flex items-center">
                                                <i class="icon-feather-trending-up text-base text-blue-500 mr-1.5"> </i>
                                                142 People donated
                                            </div>
    
                                            <div class="mt-4 -m-3.5">
                                                <div class="bg-gray-100 h-2 w-full relative overflow-hidden">
                                                    <div class="bg-blue-600 w-1/3 h-full"></div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </li>
    
                            </ul>
    
                            <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
                            <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white uk-invisible"
                                href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>
    
                        </div>
                    </div>
    
                    <br>
    
                    <div class="my-2 flex items-center justify-between pb-3">
                        <div>
                            <h2 class="text-xl font-semibold"> Your Friends also following</h2>
                        </div>
                        <a href="#" class="text-blue-500"> See all </a>
                    </div>
    
                    <div class="divide-y divide-gray-100 card px-5 py-2">
    
                        <div class="flex sm:flex-row flex-col sm:space-x-5 py-5 relative w-full">
                            <a href="timeline-fundraiser.html"
                                class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                                <img src="assets/images/funding/funder-3.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                            </a>
                            <div class="flex-1 relative sm:mt-0 mt-4">
                                <a href="timeline-fundraiser.html" class="text-lg font-semibold line-clamp-2"> Racing to End
                                    Duchenne </a>
                                <div class="text-gray-400 mt-2"> by <a href="timeline.html" class="font-medium">Alex
                                        Dolgove</a> </div>
                                <div class="mt-1 text-sm font-medium"> 620 Donated</div>
                                <div class="mt-3">
                                    <div class="text-blue-500 font-medium mb-2"> <span> 2,429,000</span> <span> of</span>
                                        <span> 32,000,000</span> Raised </div>
                                    <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                                        <div class="bg-blue-600 w-1/3 h-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:space-x-5 py-5 relative w-full">
                            <a href="timeline-fundraiser.html"
                                class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                                <img src="assets/images/funding/funder-2.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                            </a>
                            <div class="flex-1 relative sm:mt-0 mt-4">
                                <a href="timeline-fundraiser.html" class="text-lg font-semibold line-clamp-2">Naveen's
                                    Boston Marathon &amp; Charles River Marathon </a>
                                <div class="text-gray-400 mt-2"> by <a href="timeline.html" class="font-medium">Stella
                                        Johnson</a> </div>
                                <div class="mt-1 text-sm font-medium"> 416 Donated</div>
                                <div class="mt-3">
                                    <div class="text-blue-500 font-medium mb-2"> <span> 132,000</span> <span> of</span>
                                        <span> 92,000,000</span> Raised </div>
                                    <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                                        <div class="bg-blue-600 w-1/4 h-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col sm:space-x-5 py-5 relative w-full">
                            <a href="timeline-fundraiser.html"
                                class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                                <img src="assets/images/funding/funder-4.jpg" alt=""
                                    class="w-full h-full absolute inset-0 object-cover">
                            </a>
                            <div class="flex-1 relative sm:mt-0 mt-4">
                                <a href="timeline-fundraiser.html" class="text-lg font-semibold line-clamp-2">Striding for a
                                    Cure for Cystic Fibrosis </a>
                                <div class="text-gray-400 mt-2"> by <a href="timeline.html" class="font-medium">Adrian
                                        Mohani</a> </div>
                                <div class="mt-1 text-sm font-medium"> 320 Donated</div>
                                <div class="mt-3">
                                    <div class="text-blue-500 font-medium mb-2"> <span> 132,000</span> <span> of</span>
                                        <span> 92,000,000</span> Raised </div>
                                    <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                                        <div class="bg-blue-600 w-1/2 h-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
    
                </div>
    
                <!-- Sidebar -->
                <div class="lg:w-1/3 w-full lg:mt-0 mt-7">
    
                    <div class="card mb-6">
                        <div class="card-media h-28">
                            <div class="card-media-overly"></div>
                            <img src="assets/images/funding/funder-1.jpg" alt="" class="">
                        </div>
                        <div class="p-5">
                            <h4 class="text-xl font-semibold mb-1"> Create a fundraiser </h4>
                            <p class="font-medium"> Fundraiser make it easy to support friends, family and the causes that
                                are important to you such as:</p>
    
                            <div class="mt-4 text-base font-medium space-y-2">
                                <div class="flex items-center">
                                    <ion-icon name="medkit" class="text-lg mr-3 md hydrated" role="img" aria-label="medkit">
                                    </ion-icon> Medical
                                </div>
                                <div class="flex items-center">
                                    <ion-icon name="school" class="text-lg mr-3 md hydrated" role="img" aria-label="school">
                                    </ion-icon> Education
                                </div>
                                <div class="flex items-center">
                                    <ion-icon name="heart-circle" class="text-lg mr-3 md hydrated" role="img"
                                        aria-label="heart circle"></ion-icon> Nunprofits and more
                                </div>
                            </div>
                            <a href="#" class="bg-gray-100 rounded-lg text-center py-2 block mt-6 font-medium"> Raise
                                Money</a>
                        </div>
                    </div>
                    <div>
                        <div class="text-xl font-semibold mb-1"> We're here to help</div>
                        <div class="text-gray-400"> Answers to common questions about fundraisers </div>
                    </div>
    
                    <ul class="space-y-3.5 mt-5 uk-accordion" uk-accordion="">
                        <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                            <a class="uk-accordion-title text-base font-semibold" href="#">Who can create fundraiser?</a>
                            <div class="uk-accordion-content mt-2.5" aria-hidden="true" hidden="">
                                <p>Only people from certain countries can create fundraisers on Socialite at this time. For
                                    a complete list, click to see the full article.</p>
                                <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                            </div>
                        </li>
                        <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                            <a class="uk-accordion-title text-base font-semibold" href="#">How do charities receive
                                donations?</a>
                            <div class="uk-accordion-content mt-2.5" aria-hidden="true" hidden="">
                                <p>If you create a fundraiser for a charity, the charity will receive donations directly
                                    from Socialite, from Network for Good or from PayPal Giving Fund.</p>
                                <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                            </div>
                        </li>
                        <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                            <a class="uk-accordion-title text-base font-semibold" href="#">How do taxes work?</a>
                            <div class="uk-accordion-content mt-2.5" aria-hidden="true" hidden="">
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                                <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                            </div>
                        </li>
                        <li class="bg-gray-100 rounded-lg py-2.5 px-3 uk-open">
                            <a class="uk-accordion-title text-base font-semibold" href="#">How do fees work?</a>
                            <div class="uk-accordion-content mt-2.5" aria-hidden="false">
                                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                    nulla pariatur. Excepteur sint occaecat cupidatat proident.</p>
                                <a href="#" class="block font-medium mt-3 text-blue-600 text-sm"> See full article</a>
                            </div>
                        </li>
                    </ul>
    
                </div>
    
            </div>
    
        </div>
    </div>
@endsection