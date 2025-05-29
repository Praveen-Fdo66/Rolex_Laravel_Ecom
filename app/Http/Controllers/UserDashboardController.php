<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $reservations = Order::where('user_id', $user->_id)->with('product')->get();



                return view('dashboard.user', [
            'user' => $user,
            'reservations' => $reservations,
        ]);
    }
}
