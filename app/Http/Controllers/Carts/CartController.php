<?php

namespace App\Http\Controllers\Carts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carts\CartRequest;
use App\Models\Carts\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::all();
        return response()->json($carts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartRequest $request)
    {
        $cart = Cart::create($request->validated());
        return response()->json($cart, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cart = Cart::find($id);
        return response()->json($cart);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return response()->json(['message' => 'Cart deleted successfully']);
    }
}
