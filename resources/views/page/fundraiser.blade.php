@extends('layouts.layout')
@section('content')
    <div class="main_content">
        <div class="mcontainer">
    
            <div class="lg:flex lg:space-x-10">
    
                <div class="lg:w-2/3">
                    <div class="my-2 flex items-center justify-between pb-3">
                        <div>
                            <h2 class="text-xl font-semibold"> On going fundraising posts</h2>
                        </div>
                    </div>
    
                    <div class="divide-y divide-gray-100">
                        <livewire:feeder-block :home="'all'" :onlyFundraise="'1'" />
    
                    </div>
    
                </div>
    
                <!-- Sidebar -->
                <div class="lg:w-1/3 w-full lg:mt-0 mt-7">
    
                    <div class="card mb-6">
                        <div class="card-media h-28">
                            <div class="card-media-overly"></div>
                            <img src="https://www.saveahorse.org.au/uploads/images/fundraise-bg.jpg" alt="" class="">
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
                            <a href="/fundraise/new" class="bg-gray-100 rounded-lg text-center py-2 block mt-6 font-medium"> Raise Money</a>
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
                                <p>Only people from certain countries can create fundraisers on LightHouse at this time. Person must be registered user to raise a fund. Admin approval will be required to finalise the process</p>
                            </div>
                        </li>
                        <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                            <a class="uk-accordion-title text-base font-semibold" href="#">How do homes receive donations?</a>
                            <div class="uk-accordion-content mt-2.5" aria-hidden="true" hidden="">
                                <p>If you create a fundraiser for a home, the home will receive donations directly from LightHouse, from Network for Good or from PayPal Giving Fund. Admin approval will be required to finalise the process</p>
                            </div>
                        </li>
                        <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                            <a class="uk-accordion-title text-base font-semibold" href="#">How do taxes work?</a>
                            <div class="uk-accordion-content mt-2.5" aria-hidden="true" hidden="">
                                <p>According to the government law, no taxes will be added to the fund. Different countries may have additional fee over raised fund.</p>
                            </div>
                        </li>
                        <li class="bg-gray-100 rounded-lg py-2.5 px-3">
                            <a class="uk-accordion-title text-base font-semibold" href="#">How do fees work?</a>
                            <div class="uk-accordion-content mt-2.5" aria-hidden="false">
                                <p>No services charges at any moment in LightHouse policy. But paypal transaction fee will be added as a service charge. which will be 5% of total raised amount.</p>
                            </div>
                        </li>
                    </ul>
    
                </div>
    
            </div>
    
        </div>
    </div>
@endsection