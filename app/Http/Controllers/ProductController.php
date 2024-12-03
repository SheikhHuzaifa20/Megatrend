<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Contact;
use Carbon\Carbon;


use Illuminate\Http\Request;

class ProductController extends Controller
{




    public function index()
    {
       $data = DB::table('products')->where('feature_product', 1)
       ->orderBy('id' , 'desc')
        ->limit(4)
        ->get();

        $product = DB::table('products')
       ->orderBy('id' , 'desc')
        ->limit(4)
        ->get();

        $banners = DB::table('banners')->get();
        // return $banners;
        $home = DB::table('home')->get();


       return view('welcome', compact('data' , 'product' , 'banners' , 'home' ));
    }

    public function contact(){


        return view('layouts.contact.contact');
    }


    public function contactus(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'address' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);


        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->address = $request->input('address');
        $contact->message = $request->input('message');
        $contact->email_verified_at = Carbon::now();

        $contact->save();

        return redirect()->back()->with('success', 'Your message has been send!');
    }

	public function view_product()
    {

        $product = DB::table('products')->get();

        return view('crud.view_product' , ['products' => $product]);

	}

    public function product_detail($id)
    {
        $products = DB::table('products')->where('id', $id)->first();

        return view('product_detail'  , ['products' => $products]);

	}


	public function add_product()
    {

		return view('crud.addproduct');

	}

    public function store_product(Request $request)
    {
    $validated = $request->validate([
        'product_title' => 'required|string|max:255',
        'feature_product' => 'required|string',
        'categery' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


    $product = new Product();
    $product->product_title = $request->input('product_title');
    $product->feature_product = $request->input('feature_product');
    $product->categery = $request->input('categery');
    $product->price = $request->input('price');
    $product->description = $request->input('description');

    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    // }

    if ($request->hasFile('image')) {
        $image = $request->file('image');

        $imageName = time() . '.' . $image->getClientOriginalExtension();

        $destinationPath = public_path('uploads/product/');
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }


        $image->move($destinationPath, $imageName);


        $product->image = 'uploads/product/' . $imageName;
    }

    $product->save();

        return redirect()->route('view_product')->with('success', 'Data has been saved successfully!');
    }


    public function edit($id)
{
    $product = DB::table('products')->where('id' , $id)->get();

    return view('crud.edit_product', compact('product'));
}


public function update(Request $request, $id)
{
    $validated = $request->validate([
        'product_title' => 'required|string|max:255',
        'feature_product' => 'required|string',
        'categery' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string|max:255',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:2048',
    ]);


    $product = Product::findOrFail($id);

    if ($request->hasFile('image')) {
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products/'), $imageName);
        $product->image = 'uploads/products/' . $imageName;
    }


    $product->product_title = $request->input('product_title');
    $product->feature_product = $request->input('feature_product');
    $product->categery = $request->input('categery');
    $product->price = $request->input('price');
    $product->description = $request->input('description');
    $product->save();

    return redirect()->route('view_product', compact('product'))->with('success');
}



    public function product_destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }
        $product->delete();

        return redirect()->route('view_product')->with('success', 'Product deleted successfully!');
    }


}
