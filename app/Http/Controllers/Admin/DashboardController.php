<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $user = auth()->user(); 

        $ownedProductIds = $user->products()->pluck('id');

        $product_count = $user->products()->count();
        $order_success = Order::where('status', 'completed')
            ->whereHas('orderItems', function ($query) use ($ownedProductIds) {
                $query->whereIn('product_id', $ownedProductIds);
            })->count();
        $order_cancel = Order::where('status', 'cancelled')
            ->whereHas('orderItems', function ($query) use ($ownedProductIds) {
                $query->whereIn('product_id', $ownedProductIds);
            })->count();

        $order = Order::whereHas('orderItems', function ($query) use ($ownedProductIds) {
            $query->whereIn('product_id', $ownedProductIds);
        })->count();

        
        return view('admin.dashboard', compact('product_count','order_success', 'order_cancel','order'));
    }
}
