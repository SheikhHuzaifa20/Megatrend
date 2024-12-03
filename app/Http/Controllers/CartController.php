<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use DB;


class CartController extends Controller
{
    public function cart()
	{

			return view('/');
	}


    public function saveCart(Request $request)
    {
        // Retrieve the product by ID
        $product = Product::find($request->product_id);


        if ($product) {
            $cart = Session::get('cart', []);

            // If the product already exists in the cart, increment its quantity
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] += $request->quantity;
            } else {
                // If the product is new in the cart, add it
                $cart[$product->id] = [
                    "id" => $product->id, // Ensure this key is 'product_title'
                    "product_title" => $product->product_title, // Ensure this key is 'product_title'
                    "quantity" => $request->quantity,
                    "price" => $product->price,
                    "image" => $product->image // Ensure this key is 'image'
                ];
            }
            // dd($product);

            // Update the session with the new cart data
            Session::put('cart', $cart);

            return back()->with('success', 'Product added to cart successfully!');
        }

        return back()->with('error', 'Product not found');
    }


    public function removeCart($id)
	{

		//$id = isset($_POST['ArrayofArrays'][0]) ? $_POST['ArrayofArrays'][0] : '';

		if ($id != "") {

			if (Session::has('cart')) {

				$cart = Session::get('cart');
			}

			if (array_key_exists($id, $cart)) {

				unset($cart[$id]);
			}


			Session::put('cart', $cart);
		}

		// echo 'success';
		Session::flash('flash_message', 'Product item removed successfully');
		Session::flash('alert-class', 'alert-success');
		return back();
	}


    public function checkout()
	{


		if (Session::get('cart') && count(Session::get('cart')) > 0) {

			return view('layouts.shop.checkout', ['cart' => Session::get('cart')]);
		} else {
			Session::flash('flash_message', 'No Product found');
			Session::flash('alert-class', 'alert-success');
			return redirect('/');
		}
	}




}
