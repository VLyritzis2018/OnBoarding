<?php

namespace App\Exports;

use App\Models\OnboardingData;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return OnboardingData::select('age', 'country', 'language', 'buttonPresses', 'created_at')->get();
    }
}
