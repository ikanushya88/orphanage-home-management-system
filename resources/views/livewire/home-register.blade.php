<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <!-- create page-->
    <div class="max-w-2xl m-auto shadow-md rounded-md bg-white lg:mt-20">
    
        <!-- form header -->
        <div class="text-center border-b border-gray-100 py-6">
            <h3 class="font-bold text-xl"> Create New Home </h3>
        </div>
    
        <!-- form body -->
        <div class="p-10 space-y-7">
            {{-- 'slug', '', '', '', 'document', 'created_by' --}}
            <div class="line">
                <input class="line__input" id="name" name="name" wire:model='name' type="text" value="" autocomplete="off" onkeyup="this.setAttribute('value', this.value);" value="" placeholder="Home Name" />
                {{-- <span for="name" class="line__placeholder"> s </span> --}}
            </div>
            @error('name') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
            <div class="line">
                
                <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                    <div class=" ml-1"> Add your Logo <small>(320px x 320px)</small> </div>
                    <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                        <div>
                            <div wire:loading wire:target="logo">
                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                    y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="h-8 w-8">
                                    <path opacity="0.2" fill="#000"
                                        d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                                    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                                    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                                    <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                                    C22.32,8.481,24.301,9.057,26.013,10.047z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20"
                                            dur="0.9s" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                            @if ($logo)
                            <img src="{{ $logo->temporaryUrl() }}" class="h-9" />
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
                    <input type='file' class="hidden" id="logo1" wire:model='logo' />
                </div>
            </div>
            @error('logo') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
            <div class="line">
                
                <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                    <div class=" ml-1"> Add your Cover Image <small>(1200px x 600px)</small></div>
                    <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                        <div>
                            <div wire:loading wire:target="cover_image">
                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="h-8 w-8">
                                    <path opacity="0.2" fill="#000"
                                        d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                                                                s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                                                                c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                                    <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                                                                C22.32,8.481,24.301,9.057,26.013,10.047z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20"
                                            dur="0.9s" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                            @if ($cover_image)
                            <img src="{{ $cover_image->temporaryUrl() }}" class="h-9" />
                            @endif
                        </div>
                        <label for="cover_image" class="mb-0">
                            <svg class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </label>
                    </div>
                    <input type='file' class="hidden" id="cover_image" wire:model='cover_image' />
                </div>
            </div>
            @error('cover_image') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
            <div class="w-full md:inline-flex gap-3">
                <div class="w-full md:w-1/3 mt-3 md:mt-0">
                    <div class="line">
                        <input class="line__input" id="contact_number" name="contact_number" wire:model='contact_number' type="text" value=""
                            autocomplete="off" placeholder=" Contact Number">
                        {{-- <span for="contact_number" class="line__placeholder"> </span> --}}
                    </div>
                    @error('contact_number') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
                </div>
                <div class="w-full md:w-2/3 mt-3 md:mt-0">
                    <div class="line">
                        <input class="line__input" id="email" name="email" wire:model='email' type="email" value="" autocomplete="off" placeholder="Email Address">
                        {{-- <span for="email" class="line__placeholder">  </span> --}}
                    </div>
                    @error('email') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
                </div>
            </div>
            <div class="line">
                <input class="line__input" id="address" name="address" wire:model='address' type="text" value="" autocomplete="off" placeholder="Location">
                <span for="address" class="line__placeholder">  </span>
            </div>
            @error('address') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
            <div class="line">
                <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-2 shadow-sm items-center">
                    <div class="ml-1"> Document for Verification <small>(below 2MB)</small> </div>
                    <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">
                        <div>
                            <div wire:loading wire:target="document">
                                <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    x="0px" y="0px" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve" class="h-8 w-8">
                                    <path opacity="0.2" fill="#000"
                                        d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
                                                                s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
                                                                c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z" />
                                    <path fill="#000" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
                                                                C22.32,8.481,24.301,9.057,26.013,10.047z">
                                        <animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20"
                                            dur="0.9s" repeatCount="indefinite" />
                                    </path>
                                </svg>
                            </div>
                            @if ($document)
                            Uploaded...
                            @endif
                        </div>
                        <label for="document" class="mb-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer">
                                <path fill-rule="evenodd"
                                    d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                    clip-rule="evenodd"></path>
                                <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                            </svg>
                        </label>
                    </div>
                </div>
                <input type='file' class="hidden" id="document" wire:model='document' />
            </div>
            @error('document') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
            <div class="line h-32">
                <textarea class="line__input h-32" id="" name="about" wire:model='about' type="text" value="" autocomplete="off" placeholder="Home description"></textarea>
                {{-- <span for="username" class="line__placeholder">  </span> --}}
            </div>
            @error('about') <span class="text-red-600 font-bold text-xs">{{$message}}</span> @enderror
        </div>
    
        <!-- form footer -->
        <div class="border-t flex justify-between lg:space-x-10 p-7 bg-gray-50 rounded-b-md">
            <p class="text-sm leading-6"> You can add images, contact info and other details after you create the
                Home. </p>
            <button type="button" class="button lg:w-1/2" wire:click='submitForm'>
                Create Now
            </button>
        </div>
    </div>
</div>
