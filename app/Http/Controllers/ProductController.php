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
            'link' => 'required|url', // Ensure the link field is present
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

        // Save product to the database, ensuring 'link' is included
        Product::create([
            'prod_img' => $imagePath,
            'description' => $request->description,
            'link' => $request->link, // Ensure the link is passed
        ]);

        Alert::success('Success!', 'Product added successfully.')->autoClose(3000);

        return redirect()->route('admin');
    }

    // Function to get all products
    public function index()
    {
        $products = Product::latest()->get(); // Fetch all products
        return view('admin.upload', compact('products')); // Pass data to the Blade view
    }

    public function showWelcome()
    {
        $products = Product::latest()->get(); // Fetch all products
        return view('welcome', compact('products')); // Pass products to welcome.blade.php
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'productImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        // Find the product
        $product = Product::findOrFail($id);

        // Handle image upload (if new image is uploaded)
        if ($request->hasFile('productImage')) {
            $image = $request->file('productImage');
            $imageName = time() . '_cropped_' . $image->getClientOriginalName();
            
            // Move image to public/img folder
            $image->move(public_path('img'), $imageName);
            
            // Update image path in the database
            $product->prod_img = 'img/' . $imageName;
        }

        // Update other fields
        $product->description = $request->description;
        $product->link = $request->link;
        $product->save();

        Alert::success('Success!', 'Product updated successfully.')->autoClose(3000);
        
        return redirect()->route('admin');
    }
}
