<?php

namespace App\Http\Livewire\AgeCategory;

use App\Models\OnboardingData;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Teens extends Component
{
    public $currentStep = 1;
    public string $email = '';
    protected $listeners = ['translate'];

    protected $rules = [
        'email' => 'required|email|unique:onboarding_data,email',
    ];
    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'email.unique' => 'This Email Address already been used here.'
    ];
    public function store()
    {
        try {
            $this->validate();
            $age = session()->get('Age');
            $country = session()->get('country');
            $buttoneType = session()->get('buttonType');
            $email = $this->email;
            $language = session()->get('locale');

            OnboardingData::create([
                'email' => $email,
                'age' => $age,
                'country' => $country,
                'buttonPressed' => $buttoneType,
                'language' => $language
            ]);
            $this->dispatchBrowserEvent('submit', [
                'type' => 'success',
                'title' => 'Email Saved.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $age = '';
            $country = '';
            $buttoneType = '';
            $this->email = '';
            $language = '';
            session()->put('teensPageCurrentStep', 1);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => $th->getMessage(),
                'icon' => 'error',
                'iconColor' => 'red',
            ]);
        }
    }
    public function stepBack()
    {
        if ($this->currentStep == 1) {
            $this->currentStep = 1;
        } else {
            $this->currentStep--;
            session()->put('teensPageCurrentStep', $this->currentStep);
        }
    }

    public function nextStep()
    {
        $this->currentStep++;
        session()->put('teensPageCurrentStep', $this->currentStep);
    }
    public function translate()
    {
        Session()->get('locale');
        return back();
    }
    public function render()
    {
        return view('livewire.age-category.teens', [
            'emergency_data' => DB::table('emergencyrooms')->select('phone', 'website', 'name')
                ->where('country', session()->get('country'))
                ->where('website', '!=', 'NULL')
                ->take(2)
                ->get(),
        ])->layout('layouts.guest');
    }
}
