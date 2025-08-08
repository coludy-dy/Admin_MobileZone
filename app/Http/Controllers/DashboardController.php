<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index($active)
    {
        $product_count = Product::count();
        $order_count = Order::count();
        $register_count = User::count();
        
        return view('dashboard',compact('product_count','order_count','register_count','active'));        
    }
}
