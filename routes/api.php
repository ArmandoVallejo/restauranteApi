<?php

use App\Http\Controllers\Addresses\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserAddress\UserAddressController;
use App\Http\Controllers\Category\CategoryController;
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

Route::apiResource('orders', OrderController::class);