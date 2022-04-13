<?php

namespace App\Http\Livewire;

use App\Models\Feed;
use App\Models\Home;
use Livewire\Component;
use Livewire\WithFileUploads;

class NormalFeed extends Component
{
    use WithFileUploads;
    
    public $home = 0;
    public $home_name = '';
    public $home_logo = '';
    public $txt = '';
    public $image_upload;
    public $loadFeedModal = false;
    public $post_images = [];

    protected $listeners = [
        '$refresh'
    ];

    public function mount() {
        if ($this->home == 0 && auth()->user()->homes()->count()) {
            $home = auth()->user()->homes()->first();
            $this->home = $home->id;
            $this->home_name = $home->name;
            $this->home_logo = \Storage::url($home->logo);
        }
    }

    protected $rules = [
        'txt' => 'required|min:6',
    ];

    public function render() {
        return view('livewire.normal-feed')->extends('layouts.layout');
    }

    public function share() {
        $this->validate();
        // 
        $feed = Feed::create([
            'user_id' => auth()->id(),
            'content' => $this->txt,
            'slug' => \sprintf('/p/%s/%s', auth()->id(), time()),
            'home_id' => $this->home,
        ]);

        if (count($this->post_images) > 0) {
            $i = 1;
            $_main_folder = 'public/feed/'.$feed->id.'/';
            foreach ($this->post_images as $img) {
                $img_mv = explode('.', $img);
                \Storage::move($img, $_main_folder.'images/img-'.sprintf('%02d', $i++).'.'.end($img_mv));
            }
        }
        $this->post_images = [];
        $this->txt = '';
        $this->emitTo('feeder-block', '$refresh');
        // $this->dispatchBrowserEvent('feeded');
    }

    public function homeChange($id) {
        $home = Home::find($id);
        $this->home_name = $home->name;
        $this->home_logo = \Storage::url($home->logo);
    }

    public function loadingFeedModal(){
        $this->loadFeedModal = true;
    }

    public function updatedImageUpload() {
        $this->validate([
            'image_upload.*' => 'image|mimes:png,jpg,gif|max:2048', // 1MB Max
        ]);
        foreach ($this->image_upload as $photo) {
            $this->post_images[] = $photo->store('public/temporary');
        }
    }

    public function deleteImageSource($img) {
        \Storage::delete($img);
        foreach ($this->post_images as $key => $value) {
            if($value == $img)
                unset($this->post_images[$key]);
        }
        $this->render();
    }
}
