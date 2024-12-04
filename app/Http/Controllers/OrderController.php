<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        // Validate the request
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'phone' => 'required|numeric|min:11',
                'email' => 'required|email|max:255',
                'postcode' => 'required|string|max:255',
                'Ordernote' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation exception
            return back()->withErrors($e->errors())->withInput();
        }
    
        // Retrieve the cart data from the session
        $cart = session('cart', []);
        $totalAmount = 0;
        $totalQuantity = 0;
    
        // Calculate total amount and total quantity
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
            $totalQuantity += $item['quantity'];
        }
    
        // Create the order
        $order = new Order();
        $order->name = $validated['name'];
        $order->address = $validated['address'];
        $order->city = $validated['city'];
        $order->phone = $validated['phone'];
        $order->email = $validated['email'];
        $order->postcode = $validated['postcode'];
        $order->Ordernote = $validated['Ordernote'];
        $order->total_amount = $totalAmount; // Total amount of the order
        $order->total_quantity = $totalQuantity; // Total quantity of the products
        $order->save();
    
        // Save each product in the order items table
        foreach ($cart as $item) {
            // Assuming you have an OrderItem model
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['id'];
            $orderItem->product_title = $item['product_title'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->total_price = $item['price'] * $item['quantity'];
            $orderItem->save();
    
            // Update product stock (assuming you have a Product model)

        }
    
        // Clear the cart after the order is placed
        session()->forget('cart');
    
        return redirect('/')->with('success', 'Order has been placed successfully!');
    }
    



}
