<?php

use App\Http\Livewire\CareTips;
use App\Http\Livewire\AgeCategory;
use App\Http\Livewire\AgeCategory\OldAgeAdults;
use App\Http\Livewire\AgeCategory\Teens;
use App\Http\Livewire\AgeCategory\YoungAdults;
use App\Http\Livewire\EmergencyContacts;
use App\Http\Livewire\MinPlanForm;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\OnboardingIntroduction;
use App\Http\Livewire\ShowFormData;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';
// Redirect main route to Home Page.
Route::get('/', function () {
    return redirect('/home');
});
// Home Route
Route::get('/home', OnboardingIntroduction::class)->name('home');
// Age Route
Route::get('/home/guidance', AgeCategory::class)->name('Guidance');
Route::get('/home/guidance/teens', Teens::class)->name('teens');
Route::get('/home/guidance/young-adults', YoungAdults::class)->name('youngAdults');
Route::get('/home/guidance/adults', OldAgeAdults::class)->name('adults');
// Care Tips Route
Route::get('/help', CareTips::class)->name('help');
// Download App Route
Route::get('/downloadApp', function () {
    return view('downloadApp');
})->name('downloadApp');
// Addmin Routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('admin/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/admin/formdata', ShowFormData::class)->middleware(['auth', 'verified'])->name('formData');
    Route::get('/admin/emergencycontacts', EmergencyContacts::class)->middleware(['auth', 'verified'])->name('contacts');
});
