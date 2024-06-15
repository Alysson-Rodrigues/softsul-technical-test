<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ApiOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return response(json_encode($orders), 200);
    }

    public function store(Request $request)
    {
        if ($request->get('customer_name') == null)
            return response(json_encode([
                'error' => 'Missing customer_name field. Please provide a customer name.',
            ], 400), 400);
        try {
            $order = new Order([
                'customer_name' => $request->get('customer_name'),
                'delivery_date' => $request->get('delivery_date'),
                'status' => $request->get('status') ?? 0,
            ]);
            $order->save();
            return response(json_encode($order), 201);
        } catch (\Exception $e) {
            return response(json_encode([
                'error' => "An error occurred while saving the order. Please try again later. Error: " . $e->getMessage(),
            ], 500), 500);
        }
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        if ($request->get('delivery_date'))
            $order->status = 1;
        try {
            $order->update($request->all());
            return response(json_encode($order), 202);
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'No query results for model') !== false) {
                return response(json_encode([
                    'error' => 'Order not found',
                ], 404), 404);
            }
            return response(json_encode([
                'error' => "An error occurred while updating the order. Please try again later. Error: " . $e->getMessage(),
            ], 500), 500);
        }
    }

    public function destroy($id)
    {
        try {
            $order = Order::findOrFail($id);
            $order->delete();
            return response(
                json_encode([
                    'message' => 'Order has been deleted successfully',
                ], 200),
            );
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'No query results for model') !== false) {
                return response(json_encode([
                    'error' => 'Order not found',
                ], 404), 404);
            }
            return response(json_encode([
                'error' => '
                An error occurred while deleting the order. Please try again later. Error: ' . $e->getMessage(),
            ], 500), 500);
        }
    }
}
