<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{


	public function Banner()
    {

		return view('home.add_items');

	}

    public function store_banners(Request $request)
    {
        $validated = $request->validate([
            'banners1' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners2' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners3' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners4' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners5' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners6' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners7' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners8' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners9' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'banners10' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $banners = new Banner(); // Use the Banner model

        for ($i = 1; $i <= 10; $i++) {
            $bannerField = 'banners' . $i;

            if ($request->hasFile($bannerField)) {
                $image = $request->file($bannerField);
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/products/'), $imageName);
                $imagePath = 'uploads/products/' . $imageName;

                $banners->$bannerField = $imagePath;
            }
        }

        $banners->save();

        return redirect()->back()->with('success', 'Items have been successfully stored.');
    }
}


