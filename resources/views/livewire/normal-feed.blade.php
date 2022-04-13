<div>
    <div class="card lg:mx-0 ">
        <div
            class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 relative shadow-2xl uk-animation-slide-bottom-small">
            <div class="flex flex-1 items-start space-x-4 p-5">
                <img src="{{$home_logo}}" class="bg-gray-200 border border-white rounded-full w-11 h-11">
                <div class="flex-1 pt-2">
                    <textarea class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none"
                        wire:model='txt' rows="5" placeholder="What's Your Mind ? {{$home_name}}!"></textarea>
                </div>
        
            </div>
            <div class="line p-4">
                <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                    <div class=" ml-1"> Add Images</div>
                    <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                        <div>
                            <div wire:loading wire:target="image_upload">
                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40"
                                    enable-background="new 0 0 40 40" xml:space="preserve" class="h-8 w-8">
                                    <path opacity="0.2" fill="#000"
                                        d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946 s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634 c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                                    <path fill="#000"
                                        d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0 C22.32,8.481,24.301,9.057,26.013,10.047z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate"
                                            from="0 20 20" to="360 20 20" dur="0.9s" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <label for="image_upload" class="mb-0">
                            <svg class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </label>
                    </div>
                    <input type='file' class="hidden" id="image_upload" wire:model='image_upload' multiple />
                </div>
                @error('image_upload.*') <span class="text-xs text-red-600 font-bold">{{$message}} </span> @enderror
                @error('txt') <span class="text-xs text-red-600 font-bold">{{$message}} </span> @enderror
            </div>
            <div class="border-t grid md:grid-cols-5 grid-cols-2 mt-10 gap-3">
                @if ($post_images)
                    @foreach ($post_images as $img)
                        <div>
                            <img src="{{ \Storage::url($img) }}" class="w-full h-auto " />
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="flex items-center w-full justify-between border-t p-3 mt-5">
                <select class="mt-2 story w-auto" wire:model='home' wire:change='homeChange($event.target.value)'>
                    @foreach(auth()->user()->homes()->get() as $home)
                    <option value="{{$home->id}}">{{$home->name}}</option>
                    @endforeach
                </select>
        
                <div class="flex space-x-2">
                    <a href="javascript:void(0)" wire:click='share' id="btn-feed-sharer" class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium"> Share </a>
                </div>
        
                <a href="javascript:void(0)" wire:click='share' hidden
                    class="bg-blue-600 flex h-9 items-center justify-center rounded-lg text-white px-12 font-semibold"> Share </a>
            </div>
        </div>
    </div>

    
</div>
