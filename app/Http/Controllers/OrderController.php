<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function sendMailOrder(Request $request)
    {
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
    
        return view('success');
    }
}