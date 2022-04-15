<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
    <div class="header_search"><i class="uil-search-alt"></i>
        <input value="" wire:model='inputSearch' type="text" class="form-control" placeholder="Search for Homes..." autocomplete="off">
        @if($homes)
        <div class="header_search_dropdown absolute block">
            <h4 class="search_title"> {{count($homes)}} Results found!</h4>
            <ul>
                @foreach($homes as $home)
                <li>
                    <a href="/h/{{$home->slug}}" target="_blank" wire:click='clrRoot'>
                        <img src="{{\Storage::url($home->logo)}}" alt="" class="list-avatar">
                        <div class="list-name"> {{$home->name}} </div>
                    </a>
                </li>
                @endforeach
            </ul>
    
        </div>
        @endif
    </div>
</div>
