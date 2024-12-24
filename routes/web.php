<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/success', function () {
    return view('success');
});

Route::post('/send-mail', function (\Illuminate\Http\Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:10',
        'address' => 'required|string|max:500',
        'product_name' => 'required|string|max:255',
        'quantity' => 'required|integer',
    ]);

    $details = [
        'name' => $validated['name'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'product_name' => $validated['product_name'],
        'quantity' => $validated['quantity'],
    ];

    Mail::to(env('MAIL_TO_ADDRESS', 'eatsoosoo@gmail.com'))->send(new ContactMail($details));
    return back()->with('success', 'Đặt hàng thành công!');
    return view('success');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
