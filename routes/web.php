<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\UserCrud;
use Livewire\Livewire;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('web')->group(function (){
    Route::middleware(['auth', 'verified'])->group(function (){
        Route::view('/', 'dashboard');

        Route::view('user',[PageController::class, 'index'])->middleware(['auth', 'verified'])->name('user');

        Route::resource('users', UserController::class);

        Route::resource('bookings', BookingController::class);

        Route::view('dashboard', 'dashboard')
            ->name('dashboard');

        Route::view('profile', 'profile')
            ->name('profile');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });
});



require __DIR__.'/auth.php';
