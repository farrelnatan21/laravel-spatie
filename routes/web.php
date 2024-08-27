<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/admin', function () {
    return '<h1>Hello World</h1>';
})->middleware(['auth', 'verified','role:admin']);

Route::get('/penulis', function () {
    return '<h1>Hello penulis</h1>';
})->middleware(['auth', 'verified','role:penulis|admin']);

require __DIR__.'/auth.php';
