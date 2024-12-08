<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Orders\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        try {
            $order = Order::create($request->validated());
            return response()->json($order, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->validated());
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }

    public function getOrdersByUser($userId)
    {
        try {
            $orders = Order::where('user_id', $userId)
                          ->with('user')  
                          ->orderBy('created_at', 'desc')
                          ->get();

            return response()->json($orders);
            
        } catch (\Exception $e) {
            Log::error('Error al obtener órdenes del usuario: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las órdenes del usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
