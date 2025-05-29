<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use MongoDB\BSON\ObjectId;
use App\Models\Order;



class ProductController extends Controller
{

//create/add new product

    public function new_watches()
    {
        $products = Product::all();
        return view('products.new_watches', compact('products'));
    }

    public function create()
    {
        $products = Product::all(); // fetch all existing products
        return view('products.create', compact('products')); // pass them to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

    $image = $request->file('image');
    $originalName = $image->getClientOriginalName(); // watch1.png
    $filename = $originalName;
    $imagePath = $image->storeAs('products', $filename, 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.new_watches')->with('success', 'Product added successfully!');
    }



public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

        $product = Product::find($id); // MongoDB: use find() not findOrFail()

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->price = $request->price;


    // Check if a new image is uploaded
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // Get uploaded file
        $image = $request->file('image');
        // Get original file name like watch1.png
        $originalName = $image->getClientOriginalName();
        // Store file with original name under storage/app/public/products
        $imagePath = $image->storeAs('products', $originalName, 'public');
        // Save image path to DB
        $product->image = $imagePath;


        // // Store the new image
        // $imagePath = $request->file('image')->store('products', 'public');
        // $product->image = $imagePath;
    }

    $product->save();

    return redirect()->route('products.create')->with('success', 'Product updated successfully!');
}



public function destroy($id)
{
    // Convert string ID to MongoDB ObjectId
    $product = \App\Models\Product::where('_id', new ObjectId($id))->first();

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found.');
    }

    // Delete image from storage
    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    // Delete product from MongoDB
    $product->delete();

    return redirect()->route('products.create')->with('success', 'Product deleted successfully!');
}

public function show($id)
{
    $product = Product::find($id);

    if (!$product) {
        abort(404); // Avoids trying to load a null product
    }

    return view('products.show', compact('product'));
}

public function reserveWatch(Request $request)
{
    Order::create([
        'user_id' => auth()->id(),
        'watch_id' => $request->watch_id,
        'price' => $request->price,
        'status' => 'reserved',
        'reserved_at' => now(),
    ]);

    return back()->with('success', 'Watch reserved!');
}




}

