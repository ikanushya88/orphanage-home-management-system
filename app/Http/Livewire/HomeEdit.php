<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class HomeEdit extends Component
{
    use WithFileUploads;

    public $home;
    
    public $name = '';
    public $contact_number = '';
    public $email = '';
    public $address = '';
    public $about = '';

    public $logo;
    public $edit_logo;
    public $cover_image;
    public $edit_cover_image;
    public $document;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'contact_number' => 'required',
        'address' => 'required',
        'about' => 'required',
        'logo' => 'nullable|image|max:2048',
        'cover_image' => 'nullable|image|max:2048',
        'document' => 'nullable|file|max:2048',
    ];

    public function mount() {
        $edit_home = Home::find($this->home);
        $this->name = $edit_home->name;
        $this->edit_logo = $edit_home->logo;
        $this->about = $edit_home->about;
        $this->edit_cover_image = $edit_home->cover_photo;
        $this->contact_number = $edit_home->contact_number;
        $this->email = $edit_home->email;
        $this->address = $edit_home->address;
    }

    public function render()
    {
        return view('livewire.home-edit');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm() {

        $this->validate();

        $data = [];
        $data['name'] = $this->name;
        $data['about'] = $this->about;
        $data['contact_number'] = $this->contact_number;
        $data['email'] = $this->email;
        $data['address'] = $this->address;

        if ($this->logo) {
            $data['logo'] = $this->getStorePath($this->logo);
        }

        if ($this->cover_image) {
            $data['cover_photo'] = $this->getStorePath($this->cover_image);
        }

        if ($this->document) {
            $data['document'] = $this->getStorePath($this->document);
            $data['verified_by'] = null;
        }

        $home = Home::find($this->home);
        $home->update($data);
        return redirect('/h/'.$home->slug);
    }

    private function getStorePath($file) {
        return $file->store('public/homes');
    }
}
