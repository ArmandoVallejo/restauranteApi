<?php

use App\Http\Controllers\Addresses\AddressController;
use App\Http\Controllers\CartDish\CartDishController;
use App\Http\Controllers\Carts\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserAddress\UserAddressController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dishes\DishController;
use App\Http\Controllers\OrderDish\OrderDishController;
use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Table\TableController;

Route::prefix('users')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
  
    Route::post('/{user}/addresses/{address}', [UserAddressController::class, 'attach']);
    Route::get('/{user}/address', [UserAddressController::class, 'getUserAddresses']);
    Route::delete('/{user}/addresses/{address}', [UserAddressController::class, 'detach']);
}); 

Route::prefix('addresses')->group(function () {
    Route::get('/', [AddressController::class, 'index']);
    Route::post('/', [AddressController::class, 'store']);
    Route::get('/{id}', [AddressController::class, 'show']);
    Route::put('/{id}', [AddressController::class, 'update']);
    Route::delete('/{id}', [AddressController::class, 'destroy']);
}); 

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
});

Route::prefix('tables')->group(function () {
    Route::get('/', [TableController::class, 'index']);
    Route::post('/', [TableController::class, 'store']);
    Route::get('/{id}', [TableController::class, 'show']);
    Route::put('/{id}', [TableController::class, 'update']);
    Route::delete('/{id}', [TableController::class, 'destroy']);
});

Route::prefix('orders')->group(function () {
    Route::apiResource('',OrderController::class);
    
    Route::post('/{order}/dishes/{dish}', [OrderDishController::class, 'attach'])
        ->name('orders.dishes.attach');
        
    Route::delete('/{order}/dishes/{dish}', [OrderDishController::class, 'detach'])
        ->name('orders.dishes.detach');
        
    Route::get('/{order}/dishes', [OrderDishController::class, 'getOrderDishes'])
        ->name('orders.dishes.index');
        
    Route::get('/user/{userId}', [OrderController::class, 'getOrdersByUser'])
        ->name('orders.user');
});

Route::apiResource('dishes', DishController::class);

Route::prefix('carts')->group(function () {
    Route::get('/', [CartController::class, 'index']);
    Route::post('/', [CartController::class, 'store']);
    Route::get('/{id}', [CartController::class, 'show']);
    Route::delete('/{id}', [CartController::class, 'destroy']);
    
    Route::post('/{cart}/dishes/{dish}', [CartDishController::class, 'attach'])
        ->name('carts.dishes.attach');
        
    Route::delete('/{cart}/dishes/{dish}', [CartDishController::class, 'detach'])
        ->name('carts.dishes.detach');
        
    Route::get('/{cart}/dishes', [CartDishController::class, 'getCartDishes'])
        ->name('carts.dishes.index');
});