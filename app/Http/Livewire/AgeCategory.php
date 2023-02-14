<?php

namespace App\Http\Livewire;

use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class AgeCategory extends Component
{
    public string $age = '';
    protected $listeners = ['translate'];

    public function setAge()
    {
        session(['Age' => $this->age]);

        if ($this->age == '14-17') {
            return redirect()->route('teens');
        } elseif ($this->age == '18-25') {
            return redirect()->route('youngAdults');
        } else {
            return redirect()->route('adults');
        }
    }

    public function translate()
    {
        Session()->get('locale');
        return back();
    }
    public function render()
    {
        return view(
            'livewire.age-category'
        )->layout('layouts.guest');
    }
}
