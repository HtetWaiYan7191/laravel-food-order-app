<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function list() {
        $orders = Order::when(request('key'), function($query) {
                        $query->where('orderCode', 'like', '%'. request('key').'%');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(4);
        return view('admin.order.orderList', compact('orders'));
    }
}
