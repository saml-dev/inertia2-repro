<?php

use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
  return Inertia::render('Home');
})->name('home');

Route::middleware(['auth', 'verified'])->get('/page1', function () {
  return Inertia::render('Page1');
})->name('page1');

Route::middleware(['auth', 'verified'])->get('/page2', function () {
  return Inertia::render('Page2');
})->name('page2');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
