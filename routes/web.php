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
use App\Http\Livewire\SingleContact;

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
    return redirect()->route('home');
});
// Home Route
Route::get('/tour', OnboardingIntroduction::class)->name('home');
// Age Route
Route::get('/tour/guidance', AgeCategory::class)->name('Guidance');
Route::get('/tour/guidance/teens', Teens::class)->name('teens');
Route::get('/tour/guidance/young-adults', YoungAdults::class)->name('youngAdults');
Route::get('/tour/guidance/adults', OldAgeAdults::class)->name('adults');
// Care Tips Route
Route::get('/help', CareTips::class)->name('help');
Route::get('/help/contact/{id}', SingleContact::class)->name('singleContact');
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
