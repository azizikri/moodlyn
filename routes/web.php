<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Models\MotivationalQuote;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Settings routes
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Moodlyn core features
    Route::view('mood-tracker', 'mood-tracker')->name('mood-tracker');
    Route::view('journal', 'journal')->name('journal');
    Route::view('history', 'history')->name('history');
    Route::view('journal-detail/{id}', 'journal-detail')->name('journal-detail');
});

require __DIR__.'/auth.php';
