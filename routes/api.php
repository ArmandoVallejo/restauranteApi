<?php

use App\Http\Controllers\Addresses\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\UserAddress\UserAddressController;

Route::prefix('users')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
    //direcciones de los usuarios
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