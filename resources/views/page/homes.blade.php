@extends('layouts.layout')
@section('content')
    <div class="main_content">
        <div class="mcontainer">
    
    
            <div class="flex justify-between relative md:mb-4 mb-3">
                <div class="flex-1">
                    <h2 class="text-2xl font-semibold"> All Registered Homes </h2>
                </div>
                <a href="/register/home"
                    class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="md:block hidden"> Create </span>
                </a>
            </div>
            
            <div class="relative grid grid-cols-1 md:grid-cols-4 gap-3">
                @forelse(App\Models\Home::latest()->get() as $home)
                <div class="card">
                    <div class="card-media h-28">
                        <div class="card-media-overly"></div>
                        <img src="{{\Storage::url($home->cover_photo)}}" alt="" class="">
                        @if($home->created_at->isBetween(now()->subDays(30), now()))
                        <div class="absolute bg-red-100 font-semibold px-2.5 py-1 rounded-lg text-red-500 text-xs top-2.5 left-2.5">
                            NEW </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <a href="javascript:void(0)" class="font-semibold text-lg truncate flex items-center gap-2"> {{$home->name}} 
                            @if($home->verified_by)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            @endif
                        </a>
                        <div class="flex items-center flex-wrap space-x-1 mt-1 text-sm text-gray-500 capitalize">
                            @if ($home->verified_by)
                                <span class="text-xs text-green-600 font-bold">VERIFIED HOME</span>
                            @else
                                <span class="text-xs text-red-600 font-bold">YET TO BE VERIFIED</span>
                            @endif
                        </div>
                
                        <div class="flex mt-3.5 space-x-2 text-sm font-medium">
                            <a href="/h/{{$home->slug}}"
                                class="bg-blue-600 flex flex-1 h-8 items-center justify-center rounded-md text-white capitalize">
                                @if(auth()->user()->homes()->where('home_id', $home->getKey())->count()) MANAGE @else VIEW @endif
                            </a>
                        </div>
                
                    </div>
                </div>
                @empty 
                No Homes found!
                @endforelse
            </div>

        </div>
    </div>
@endsection