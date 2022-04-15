@extends('layouts.layout')
@section('content')
    <div class="main_content">
        <div class="mcontainer">
    
            <!-- cover -->
            <div class="profile lg:rounded-b-xl">
    
                <div class="profiles_banner">
                    <img src="{{\Storage::url($feed->cover_image)}}" alt="" class="z-10">
                </div>
                <div class="profiles_content">
                    <div class="profile_info lg:p-3">
                        <h1> {{$feed->title}} </h1>
                        <div class="flex space-x-2 items-center md:pt-3 text-base md:justify-start justify-center">
                            <div> Fundraiser
                                @if($feed->home_id)
                                for <a href="/h/{{$feed->home->slug}}" class="font-medium"> {{$feed->home->name}}</a>
                                @else
                                by <a href="javascript:void(0)" class="font-medium"> {{App\Models\User::find($feed->user_id)->name}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center space-x-4 lg:absolute bottom-0 right-0 p-6 z-10 justify-center md:text-base font-medium">
                        {{-- <a href="#" class="flex items-center justify-center h-10 px-6 rounded-md space-x-1.5 bg-gray-200">
                            <span> Share </span>
                        </a> --}}
                        @if($feed->expires_at > now())
                        <a href="#" uk-toggle="target: #create-fundraise-modal"
                            class="flex items-center justify-center h-10 px-6 rounded-md space-x-1.5 bg-blue-600 text-white">
                            <ion-icon name="color-wand" class="text-xl md hydrated" role="img" aria-label="color wand">
                            </ion-icon>
                            <span> Donated</span>
                        </a>
                        @endif
                    </div>
                </div>
    
    
            </div>
    
            <div class="md:flex  md:space-x-8 lg:mx-14">
                <div class="space-y-5 flex-shrink-0 md:w-7/12">
    
                    <div class="card p-7">
    
                        <div class="font-bold text-2xl"> Goal </div>
    
                        <div class="my-4">
                            <div class="text-blue-500 mb-4 text-lg font-medium">LKR <span> {{number_format(App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->sum('amount'))}}</span> <span> of</span>
                                <span> {{number_format($feed->amount)}}</span> Raised </div>
                            <div class="bg-gray-50 rounded-2xl h-2 w-full relative overflow-hidden">
                                <div class="bg-blue-600 h-full" style="width: {{(App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->sum('amount')/$feed->amount)*100}}%"></div>
                            </div>
                        </div>
    
                        <div class="text-gray-400"> Raised by {{App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->count()}} people in {{$feed->created_at->diffForHumans(null, true)}} </div>
    
                    </div>
    
                    <div class="card p-7">
    
                        <div class="space-y-4">
    
                            <div class="space-y-4">
                                <h1 class="block text-xl font-bold"> Description </h1>
                                <p>{{$feed->content}}</p>
                            </div>
                            {{-- <div class="line-clamp-3" id="more-text">
                                Just as there are breeds of chickens for egg and breeds of chickens for meat, there are
                                ducks breeds specifically for egg production. While duck eggs are more popular in Asia, for
                                those with allergies to chicken eggs, duck eggs are a good alternative. Ron Kean from the
                                University of Wisconsin in Madison will be discussing how to raise ducks for egg production.
                                Just as there are breeds of chickens for egg and breeds of chickens for meat, there are
                                ducks breeds specifically for egg production. While duck eggs are more popular in Asia, for
                                those with allergies to chicken eggs, duck eggs are a good alternative. Ron Kean from the
                                University of Wisconsin in Madison will be discussing how to raise ducks for egg production.
                            </div>
                            <a href="#" id="more-text" uk-toggle="target: #more-text ; cls: line-clamp-3"> See more </a> --}}
    
                        </div>
    
                    </div>
    
                </div>
    
                <!-- Sidebar -->
                <div class="w-full flex-shirink-0">
    
                    <div class="card px-6 py-7">
                        <div class="mb-7">
                            <h4 class="text-xl font-semibold"> Fundraiser progress </h4>
                            <div class="grid grid-flow-col gap-2 mt-4 text-center">
                                <a href="$" class="hover:bg-gray-100 rounded-md py-2">
                                    <h4 class="font-bold text-2xl block mt-3"> {{App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->count()}} </h4>
                                    <div class="mt-1"> Donated </div>
                                </a>
                                <a href="$" class="hover:bg-gray-100 rounded-md py-2">
                                    <h4 class="font-bold text-2xl block mt-3"> {{App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->sum('amount')}} </h4>
                                    <div class="mt-1"> Invated </div>
                                </a>
                                {{-- <a href="$" class="hover:bg-gray-100 rounded-md py-2">
                                    <h4 class="font-bold text-2xl block mt-3"> 1.5K </h4>
                                    <div class="mt-1"> Shared </div>
                                </a> --}}
                            </div>
    
                        </div>
                        <hr class="-mx-6 my-5 border-gray-100">
                    </div>
    
                </div>
            </div>
    
        </div>
    </div>

    <!-- Craete post modal -->
    <div id="create-fundraise-modal" class="" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 h-fit shadow-2xl uk-animation-slide-bottom-small" style="height: fit-content">
        
            <div class="text-center py-3 border-b">
                <h3 class="text-lg font-semibold"> Give a hand </h3>
                <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 right-2" type="button" uk-close
                    uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
            </div>
            <form action="/process-transaction" method="get">
            <div class="flex flex-1 items-start space-x-4 p-5">
                <input type="hidden" name="feed_id" value="{{$feed->id}}" />
                @php 
                $due = $feed->amount - App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->sum('amount');
                @endphp
                <input type="number" placeholder="Enter the amount in LKR" name="amount" id="amount" required min="100" max="{{$due}}" onkeyup="if(this.value > {{$due}}) this.value={{$due}}; if(this.value < 1) this.value=1" />        
            </div>
            <div class="flex items-center w-full justify-end border-t p-3">
                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                        Pay Now </button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection