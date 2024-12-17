<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function sendMailOrder(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
            'product_name' => ['required', 'string'],
            'quantity' => ['required', 'integer'],
        ]);

        // Send email
        // Mail::to($request->input('email'))->send(new OrderShipped($request->all()));

        return Redirect::back()->with('status', 'order-sent');
    }
}