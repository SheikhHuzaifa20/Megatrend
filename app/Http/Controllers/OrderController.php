<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
   public function placeOrder(Request $request)
{
    // Validate the request
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email|max:255',
            'postcode' => 'required|string|max:255',
            'Ordernote' => 'required|string|max:255',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Handle validation exception, for debugging purposes
        return back()->withErrors($e->errors())->withInput();
    }

    $order = new Order();
    $order->fill($validated);
    $order->save();

    return redirect('/')->with('success', 'Data has been saved successfully!');
}


}
