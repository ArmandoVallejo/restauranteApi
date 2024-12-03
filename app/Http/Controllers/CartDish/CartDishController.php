<?php

namespace App\Http\Controllers\CartDish;

use App\Http\Controllers\Controller;
use App\Models\Carts\Cart;
use App\Models\Dishes\Dish;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CartDishController extends Controller
{
    public function attach(Request $request, Cart $cart, Dish $dish): JsonResponse
    {
        try {
            $quantity = $request->input('quantity', 1);
            $total_price = $dish->price * $quantity;
            
            if ($cart->dishes()->where('cart_dishes.dish_id', $dish->dish_id)->exists()) {
                $cart->dishes()->updateExistingPivot($dish->dish_id, [
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                    'updated_at' => now()
                ]);
                $message = 'Cantidad actualizada correctamente';
            } else {
                $cart->dishes()->attach($dish->dish_id, [
                    'quantity' => $quantity,
                    'total_price' => $total_price,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $message = 'Plato agregado al carrito correctamente';
            }
            
            return response()->json([
                'message' => $message,
                'cart' => $cart->load('dishes')
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al agregar el plato al carrito',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    public function detach(Cart $cart, Dish $dish): JsonResponse
    {
        try {
            // Verificar si el plato existe en el carrito
            if (!$cart->dishes()->where('cart_dishes.dish_id', $dish->dish_id)->exists()) {
                return response()->json([
                    'message' => 'El plato no se encuentra en el carrito'
                ], 404);
            }

            $cart->dishes()->detach($dish->dish_id);
            
            return response()->json([
                'message' => 'Plato removido del carrito correctamente',
                'cart' => $cart->load('dishes')
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al remover el plato del carrito',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getCartDishes(Cart $cart): JsonResponse
    {
        return response()->json([
            'dishes' => $cart->dishes
        ]);
    }
}
