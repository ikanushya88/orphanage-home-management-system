<div class="space-y-4">
    @forelse($feeds as $feed)
    
    @if($feed->type == 'post')
    <div class="card lg:mx-0 uk-animation-slide-bottom-small">
        <!-- post header-->
        <div class="flex justify-between items-center lg:p-4 p-2.5">
            <div class="flex flex-1 items-center space-x-4">
                @if($feed->home_id)
                <a href="/h/{{$feed->home->slug}}">
                    <img src="{{\Storage::url($feed->home->logo)}}" class="bg-gray-200 border border-white rounded-full w-10 h-10">
                </a>
                @else
                <a href="javascript:void(0)">
                    <img src="{{$feed->user->profile_photo_url}}" class="bg-gray-200 border border-white rounded-full w-10 h-10">
                </a>
                @endif
                @if($feed->home_id)
                <div class="flex-1 font-semibold capitalize">
                    <a href="/h/{{$feed->home->slug}}" class="text-black dark:text-gray-100"> {{$feed->home->name}} </a>
                    <div class="text-gray-700 text-xs flex items-center space-x-2"> {{$feed->created_at->diffForHumans()}}
                    </div>
                </div>
                @else
                <div class="flex-1 font-semibold capitalize">
                    <a href="javascript:void(0)" class="text-black dark:text-gray-100"> {{$feed->user->name}} </a>
                    <div class="text-gray-700 flex items-center space-x-2"> {{$feed->created_at->diffForHumans()}}
                    </div>
                </div>
                @endif
            </div>
            <div>
                <a href="#">
                    <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i>
                </a>
                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                    uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">
                    @if(auth()->user()->id == $feed->user_id)
                    <ul class="space-y-1">
                        <li>
                            <a href="javascript:void(0)" onclick="deleteFeed({{$feed->id}})"
                                class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                <i class="uil-trash-alt mr-1"></i> Delete
                            </a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    
        <div class="p-5 pt-0 border-b dark:border-gray-700">
    
            {{$feed->content}}
    
        </div>
    
        <div uk-lightbox>
            @php
            $globs = glob(public_path('/storage/feed/'.$feed->id.'/images') . '/*');
            $img = [];
            @endphp
            @foreach($globs as $img_dir)
            @php
            $file_exp = explode('storage', $img_dir);
            $file = '/storage'.$file_exp[1];
            $img[] = $file;
            @endphp
            @endforeach
            @if(count($globs) > 0)
            @switch(count($globs))
            @case(1)
            <div class="grid grid-cols-2 gap-2 px-5">
                <a href="{{$img[0]}}" class="col-span-2">
                    <img src="{{$img[0]}}" alt="" class="rounded-md w-full lg:h-76 object-cover">
                </a>
            </div>
            @break
            @case(2)
            <div class="grid grid-cols-2 gap-2 px-5">
                <a href="{{$img[0]}}">
                    <img src="{{$img[0]}}" alt="" class="rounded-md w-full lg:h-40 object-cover">
                </a>
                <a href="{{$img[1]}}" class="relative">
                    <img src="{{$img[1]}}" alt="" class="rounded-md w-full lg:h-40 object-cover">
                </a>
            </div>
            @break
            @case(3)
            <div class="grid grid-cols-2 gap-2 px-5">
                <a href="{{$img[0]}}" class="col-span-2">
                    <img src="{{$img[0]}}" alt="" class="rounded-md w-full lg:h-76 object-cover">
                </a>
                <a href="{{$img[1]}}">
                    <img src="{{$img[1]}}" alt="" class="rounded-md w-full lg:h-40 object-cover">
                </a>
                <a href="{{$img[2]}}" class="relative">
                    <img src="{{$img[2]}}" alt="" class="rounded-md w-full lg:h-40 object-cover">
                </a>
            </div>
            @break
            @default
            <div class="grid grid-cols-2 gap-2 px-5">
                <a href="{{$img[0]}}" class="col-span-2">
                    <img src="{{$img[0]}}" alt="" class="rounded-md w-full lg:h-76 object-cover">
                </a>
                <a href="{{$img[1]}}">
                    <img src="{{$img[1]}}" alt="" class="rounded-md w-full lg:h-40 object-cover">
                </a>
                <a href="{{$img[2]}}" class="relative">
                    <img src="{{$img[2]}}" alt="" class="rounded-md w-full lg:h-40 object-cover">
                    <div
                        class="absolute bg-gray-900 bg-opacity-30 flex justify-center items-center text-white rounded-md inset-0 text-2xl">
                        + {{count($globs) - 3}} more </div>
                </a>
                @for($i = 3; $i < count($globs); $i++) <a href="{{$img[$i]}}" class="hidden">
                    <img src="{{$img[$i]}}" alt="" class="rounded-md w-full lg:h-76 object-cover">
                    </a>
                    @endfor
            </div>
    
            @endswitch
            @endif
    
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
                    <div> </div>
                </a>
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
        </div>  
    </div>
    @elseif($feed->type == 'fundraise')
    <div class="card lg:mx-0 uk-animation-slide-bottom-small">
        <div class="flex sm:flex-row flex-col sm:space-x-5 p-5 relative w-full">
            <a href="{{$feed->slug}}"
                class="sm:w-56 w-full h-36 sm:h-auto overflow-hidden rounded-lg relative shadow flex-shrink-0">
                <img src="{{\Storage::url($feed->cover_image)}}" alt="" class="w-full h-full absolute inset-0 object-cover">
            </a>
            <div class="flex-1 relative sm:mt-0 mt-4">
                <a href="{{$feed->slug}}" class="text-lg font-semibold line-clamp-2"> {{$feed->title}} </a>
                @if($feed->home_id)
                <div class="text-gray-400 mt-2"> by <a href="/h/{{$feed->home->slug}}"
                        class="font-medium">{{$feed->home->name}}</a> </div>
                @else
                <div class="text-gray-400 mt-2"> by <a href="javascript:void(0)"
                        class="font-medium">{{App\Models\User::find($feed->user_id)->name}}</a> </div>
                @endif
                <div class="mt-1 text-sm font-medium">
                    {{App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->count()}} Donated
                </div>
                <div class="mt-3">
                    <div class="text-blue-500 font-medium mb-2"> <span>
                            {{number_format(App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->sum('amount'))}}</span>
                        <span> of</span> <span>
                            {{number_format($feed->amount)}}</span> Raised
                    </div>
                    <div class="bg-gray-100 rounded-2xl h-2 w-full relative overflow-hidden">
                        <div class="bg-blue-600 h-full"
                            style="width: {{(App\Models\Fund::where('feed_id', $feed->id)->whereIn('status', ['COMPLETED', 'PAID'])->sum('amount')/$feed->amount)*100}}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
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


