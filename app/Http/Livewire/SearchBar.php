<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Livewire\Component;

class SearchBar extends Component
{
    public $homes = [];
    public $inputSearch;

    public function render()
    {
        
        return view('livewire.search-bar');
    }

    public function updatedInputSearch() {
        if ($this->inputSearch) {
            $this->homes = Home::where('name', 'LIKE', '%'.$this->inputSearch.'%')->get();
        } else {
            $this->homes = [];
        }
    }

    public function clrRoot() {
        $this->inputSearch = '';
        $this->homes = [];
    }
}
