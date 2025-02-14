<?php

use App\Http\Controllers\Auth\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
  return Inertia::render('Home');
})->name('home');

Route::get('/page1', function () {
  return Inertia::render('Page1', [
    "message" => Inertia::defer(fn() => ["text" => "hi from deferred prop!"])
  ]);
})->name('page1');

Route::get('/page2', function () {
  return Inertia::render('Page2', [
    "message" => Inertia::defer(fn() => ["text" => "hi from deferred prop!"])
  ]);
})->name('page2');

require __DIR__ . '/auth.php';
