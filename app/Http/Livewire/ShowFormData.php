<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Exports\FormExport;
use App\Exports\UsersExport;
use App\Models\OnboardingData;
use Maatwebsite\Excel\Facades\Excel;

class ShowFormData extends Component
{
    public function export()
    {
        return Excel::download(new UsersExport, 'onboarding-users.csv');
    }
    public function render()
    {
        return view('livewire.show-form-data', [
            'responces' => OnboardingData::paginate(8),
        ]);
    }
}
