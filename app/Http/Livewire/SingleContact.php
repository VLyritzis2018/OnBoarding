<?php

namespace App\Http\Livewire;

use App\Models\Emergencyroom;
use Livewire\Component;

class SingleContact extends Component
{
    public $contact;

    public function mount($id)
    {
        $this->contact = Emergencyroom::find($id);
    }

    public function render()
    {
        return view('livewire.single-contact')->layout('layouts.guest');
    }
}
