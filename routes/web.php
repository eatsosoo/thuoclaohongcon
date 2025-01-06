<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/thuoc-lao-tien-lang', function () {
    return view('about');
});

Route::get('/thuoc-lao-hong-con', function () {
    return view('product');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/orders', [OrderController::class, 'index'])->name('order-list');
Route::post('/send-mail', [OrderController::class, 'sendMailOrder'])->name('send-mail');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
