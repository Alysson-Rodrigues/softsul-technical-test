<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function store (Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
        ]);

        $order = new Order([
            'customer_name' => $request->get('customer_name'),
            'delivery_date' => $request->get('delivery_date'),
            'status' => $request->get('status'),
        ]);

        return redirect()->route('orders.index')->with('success', 'Order has been placed successfully');
    }
}
