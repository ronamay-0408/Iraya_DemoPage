<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
        ]);

        // Handle cropped image upload
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '_cropped_' . $image->getClientOriginalName();
            
            // Save cropped image to public/img folder
            $image->move(public_path('img'), $imageName);
            
            $imagePath = 'img/' . $imageName;
        } else {
            Alert::error('Upload Failed', 'Image upload failed.');
            return redirect()->route('upload.page');
        }

        // Save product to the database
        Product::create([
            'prod_img' => $imagePath, // Store the cropped image path
            'description' => $request->description,
        ]);

        Alert::success('Success!', 'Product added successfully.')->autoClose(3000); // SweetAlert with auto-close

        return redirect()->route('upload.page'); // Redirect to upload.blade.php
    }

    // Function to get all products
    public function index()
    {
        $products = Product::latest()->get(); // Fetch all products, latest first
        return view('admin.upload', compact('products')); // Pass data to upload.blade.php
    }

    // Function to update a product
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Handle image upload (if new image is uploaded)
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '_cropped_' . $image->getClientOriginalName();
            
            // Save cropped image to public/img folder
            $image->move(public_path('img'), $imageName);
            
            $product->prod_img = 'img/' . $imageName;
        }

        // Update description
        $product->description = $request->description;
        $product->save();

        Alert::success('Success!', 'Product updated successfully.')->autoClose(3000);

        return redirect()->route('upload.page');
    }
}
