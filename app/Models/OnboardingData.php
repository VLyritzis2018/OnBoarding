<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnboardingData extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'age', 'country', 'buttonPressed', 'language'];
}
