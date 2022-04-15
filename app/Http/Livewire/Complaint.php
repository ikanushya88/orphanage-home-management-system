<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Complaint as Comp;
use Livewire\WithFileUploads;

class Complaint extends Component
{
    use WithFileUploads;
    
    public $user_id;
    public $title;
    public $description;
    public $contact_number;
    public $status;
    public $complaints;

    public $openForm = false;

    protected $rules = [
        'title' => 'required|min:6',
        'contact_number' => 'required',
        'description' => 'required',
    ];

    public function render() {
        $this->complaints = Comp::where('user_id', auth()->id())->get();
        return view('livewire.complaint');
    }

    public function addingComplaint() {
        $this->openForm = true;
    }

    public function addComplaint() {
        $this->validate();
        $complaint = new Comp();
        $complaint->user_id = auth()->id();
        $complaint->title = $this->title;
        $complaint->complaint = $this->description;
        $complaint->save();
        $this->openForm = false;
        $this->render();
    }
}
