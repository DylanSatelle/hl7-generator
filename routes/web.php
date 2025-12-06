<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MassGenerateHL7;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/HL7', function () {
    return view('HL7');
})->name('HL7');

Route::get('/scenario', function () {
    return view('hl7-scenarios');
})->name('scenario');

Route::middleware(['auth', 'verified'])
     ->get('/mass-generate-hl7', function () {
         return view('mass-generate-hl7');
     })->name('mass-generate-hl7');

Route::get('/auth/google', [\App\Http\Controllers\GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [\App\Http\Controllers\GoogleController::class, 'callback'])->name('google.callback');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
