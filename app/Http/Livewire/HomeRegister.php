<?php

namespace App\Http\Livewire;

use App\Models\Home;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class HomeRegister extends Component
{
    use WithFileUploads;
    
    public $name = '';
    public $contact_number = '';
    public $email = '';
    public $address = '';
    public $about = '';

    public $logo;
    public $cover_image;
    public $document;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'contact_number' => 'required',
        'address' => 'required',
        'about' => 'required',
        'logo' => 'image|max:2048',
        'cover_image' => 'image|max:2048',
        'document' => 'file|max:2048',
    ];

    public function updatedLogo() {
        $this->validate([ 'logo' => 'image|max:2048', ]);
    }
    public function updatedCoverImage() {
        $this->validate([ 'cover_image' => 'image|max:2048', ]);
    }
    public function updatedDocument() {
        $this->validate([ 'document' => 'file|max:2048', ]);
    }

    public function render()
    {
        return view('livewire.home-register');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm() {

        $this->validate();

        $home = new Home();
        $home->name = $this->name;
        $home->slug = $this->beautifySlug($this->name);
        $home->logo = $this->getStorePath($this->logo);
        $home->about = $this->about;
        $home->cover_photo = $this->getStorePath($this->cover_image);
        $home->contact_number = $this->contact_number;
        $home->email = $this->email;
        $home->address = $this->address;
        $home->document = $this->getStorePath($this->document);
        $home->created_by = auth()->user()->id;

        $home->save();

        auth()->user()->homes()->save($home, ['status' => 'approved']);

        return redirect('/h/'.$home->slug);
    }

    private function beautifySlug($name) {
        $slug = Str::slug($name);
        if (Home::where('slug', $slug)->count()) {
            return $slug.'-'.time();
        } 
        return $slug;
    }

    private function getStorePath($file) {
        return $file->store('public/homes');
    }
}
