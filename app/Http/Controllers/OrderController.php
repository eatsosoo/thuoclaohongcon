<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Mail\ContactMail;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $page = $request->query('page', 1);
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10, ['*'], 'page', $page)->toArray();
        $pin = env('PIN_CODE', '797979');
        return view('orders', compact('orders', 'pin'));
    }

    public function createOrder($payload)
    {
        $order = new Order();
        $order->name = $payload['name'];
        $order->phone = $payload['phone'];
        $order->address = $payload['address'];
        $order->product_name = $payload['product_name'];
        $order->quantity = $payload['quantity'];
        $order->save();
    }

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

        try {
            $this->createOrder($details);
            Mail::to(env('MAIL_TO_ADDRESS', 'eatsoosoo@gmail.com'))->send(new ContactMail($details));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Đặt hàng thất bại. Vui lòng thử lại sau'], 500);
        }
    
        return view('success');
    }
}