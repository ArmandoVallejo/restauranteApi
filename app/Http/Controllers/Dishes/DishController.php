<?php

namespace App\Http\Controllers\Dishes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dishes\DishRequest;
use App\Http\Requests\Dishes\UpdateDishRequest;
use App\Models\Dishes\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dish::all();
        return response()->json($dishes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishRequest $request)
    {
        $dish = Dish::create($request->validated());
        return response()->json($dish, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dish = Dish::find($id);
        return response()->json($dish);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishRequest $request, $id)
    {
        $dish = Dish::find($id);
        $dish->update($request->validated());
        return response()->json($dish);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
        $dish->delete();
        return response()->json(['message' => 'Dish deleted successfully']);
    }
}
