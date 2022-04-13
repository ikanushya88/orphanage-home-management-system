<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <!-- create page-->
    <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">

        <!-- form header -->
        <div class="text-center border-b border-gray-100 py-6">
            <h3 class="font-bold text-xl"> Create New Fundraise </h3>
        </div>

        <!-- form body -->
        <div class="p-10 space-y-7">
            <div class="line">
                <input class="line__input" id="title" name="title" wire:model='title' type="text" value=""
                    autocomplete="off" onkeyup="this.setAttribute('value', this.value);" value=""
                    placeholder="Title" />
                {{-- <span for="name" class="line__placeholder"> s </span> --}}
            </div>
            @error('title') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror

            <div class="w-full md:inline-flex gap-3">
                <div class="w-full md:w-1/3 mt-3 md:mt-0">
                    <div class="line">
                        <select class="mt-2 story w-auto" wire:model='home'>
                            <option value="0">For myself</option>
                            @foreach(auth()->user()->homes()->get() as $home)
                            <option value="{{$home->id}}">for {{$home->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('home') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
                </div>
                <div class="w-full md:w-2/3 mt-3 md:mt-0">
                    <div class="line">
                        <input class="line__input" id="amount" name="amount" wire:model='amount' type="number" value="" autocomplete="off"
                            onkeyup="this.setAttribute('value', this.value);" value="" placeholder="fundraise amount" />
                        {{-- <span for="name" class="line__placeholder"> s </span> --}}
                    </div>
                    @error('amount') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
                </div>
            </div>

            
            <div class="line">

                <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                    <div class=" ml-1"> Add your Cover photo <small>(1000px x 300px)</small> </div>
                    <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                        <div>
                            <div wire:loading wire:target="cover_image">
                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 40 40"
                                    enable-background="new 0 0 40 40" xml:space="preserve" class="h-8 w-8">
                                    <path opacity="0.2" fill="#000"
                                        d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                                    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                                    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                                    <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                                    C22.32,8.481,24.301,9.057,26.013,10.047z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate"
                                            from="0 20 20" to="360 20 20" dur="0.9s" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                            @if ($cover_image)
                            <img src="{{ $cover_image->temporaryUrl() }}" class="h-9" />
                            @endif
                        </div>
                        <label for="logo1" class="mb-0">
                            <svg class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </label>
                    </div>
                    <input type='file' class="hidden" id="logo1" wire:model='cover_image' />
                </div>
                <div class="block h-auto">
                    
                </div>
            </div>
            @error('cover_image') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
            <div class="line">
                <textarea class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none line__input" wire:model='txt'
                    rows="5" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="p-10 space-y-7">
            <div class="border-t grid md:grid-cols-5 grid-cols-2 mt-10 gap-3">
                @if ($post_images)
                @foreach ($post_images as $img)
                <div>
                    <img src="{{ \Storage::url($img) }}" class="w-full h-auto " />
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- form footer -->
        <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
            <p class="text-sm leading-6"> Your application will be available after admin confirmation. If you require help with this or any other aspect of your application, please do get in touch. </p>
            <button type="button" class="button lg:w-1/2" wire:click='submitForm'>
                Submit Application
            </button>
        </div>
    </div>
</div>