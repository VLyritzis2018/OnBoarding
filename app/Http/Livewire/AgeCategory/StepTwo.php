<?php

namespace App\Http\Livewire\AgeCategory;

use Livewire\Component;
use App\Models\Emergencyroom;
use Illuminate\Support\Facades\DB;

class StepTwo extends Component
{
    public function render()
    {
        return view('livewire.age-category.step-two', [
            'emergency_data' => DB::table('emergencyrooms')
                ->select('id', 'phone', 'website', 'name', 'city')
                ->where('country', session()->get('country'))
                ->where('website', '!=', 'NULL')
                ->where('email', '!=', 'NULL')
                ->take(3)
                ->get(),
        ])->layout('layouts.guest');
    }
}
