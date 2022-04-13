<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Feed;

class FundRaiseForm extends Component
{
    use WithFileUploads;
    
    public $home;
    public $txt = '';
    public $title = '';
    public $amount = '';
    public $image_upload;
    public $cover_image;
    public $post_images = [];
    
    protected $rules = [
        'txt' => 'required|min:6',
        'title' => 'required|min:6',
        'amount' => 'required|integer|digits_between:4,5',
        'cover_image' => 'image|mimes:png,jpg,gif|max:2048',
    ];

    public function render() {
        return view('livewire.fund-raise-form');
    }

    public function submitForm() {
        $this->validate();
        if($this->home && $this->home > 0) {
            $home = $this->home;
        } else {
            $home = null;
        }
        $feed = Feed::create([
            'user_id' => auth()->id(),
            'content' => $this->txt,
            'type' => 'fundraise',
            'home_id' => $home,
            'amount' => $this->amount,
            'title' => $this->title,
            'slug' => \sprintf('/p/%s/%s', auth()->id(), time()),
            'cover_image' => $this->cover_image->store('public/fundraise')
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
        $this->title = '';
        $this->cover_image = '';
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
