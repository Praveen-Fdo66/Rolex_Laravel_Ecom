<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;



class CheckoutController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) abort(404);

        return view('products.checkout', compact('product'));
    }

public function process(Request $request, $id)
{
    $product = Product::findorFail($id);


        Order::create([
        'user_id'   => Auth::id(),
        'watch_id'  => $product->_id,
        'price'     => $product->price,
        'status'    => 'reserved',
        'reserved_at' => now(),
        'customer_name'  => $request->name,
        'customer_email' => $request->email,
        'customer_phone' => $request->phone,
        'customer_address' => $request->address,
    ]);

    return redirect()->route('products.checkout.reserved')->with('product', $product->name);

}





    
    
}
