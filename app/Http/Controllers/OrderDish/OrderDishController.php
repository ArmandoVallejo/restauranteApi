<?php

namespace App\Http\Controllers\OrderDish;

use App\Http\Controllers\Controller;
use App\Models\Orders\Order;
use App\Models\Dishes\Dish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrderDishController extends Controller
{
    public function attach(Request $request, Order $order, Dish $dish): JsonResponse
    {
        try {
            $quantity = $request->input('quantity', 1);
            $total_price = $dish->price * $quantity;
            
            if ($order->dishes()->where('order_dishes.dish_id', $dish->dish_id)->exists()) {
                $order->dishes()->updateExistingPivot($dish->dish_id, [
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                    'updated_at' => now()
                ]);
                $message = 'Cantidad actualizada correctamente';
            } else {
                $order->dishes()->attach($dish->dish_id, [
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $message = 'Plato agregado a la orden correctamente';
            }
            
            return response()->json([
                'message' => $message,
                'order' => $order->load('dishes')
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al agregar el plato a la orden',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function detach(Order $order, Dish $dish): JsonResponse
    {
        try {
            if (!$order->dishes()->where('order_dishes.dish_id', $dish->dish_id)->exists()) {
                return response()->json([
                    'message' => 'El plato no se encuentra en la orden'
                ], 404);
            }

            $order->dishes()->detach($dish->dish_id);
            
            return response()->json([
                'message' => 'Plato removido de la orden correctamente',
                'order' => $order->load('dishes')
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al remover el plato de la orden',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getOrderDishes(Order $order): JsonResponse
    {
        return response()->json([
            'dishes' => $order->dishes
        ]);
    }
} 