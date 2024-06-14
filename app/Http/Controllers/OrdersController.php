<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $status = Order::STATUS;
        return view('orders', compact('orders', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
        ]);

        try {
            $order = new Order([
                'customer_name' => $request->get('customer_name'),
                'delivery_date' => $request->get('delivery_date'),
                'status' => $request->get('status'),
            ]);
            $order->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return redirect()->route('orders.index')->with('success', 'Order has been placed successfully');
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        $orders = Order::all();
        $status = Order::STATUS;
        return view('orders', compact('orders', 'status'));
    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
            return redirect()->route('orders.index')->with('success', 'Order has been deleted successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
