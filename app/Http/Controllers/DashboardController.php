<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'productsCount' => Product::count(),
            'usersCount' => User::count(),
            'ordersCount' => Order::count(),
            
        ]);


        
            $user = Auth::user();

    }
}

    //

