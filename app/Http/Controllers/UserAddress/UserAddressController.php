<?php

namespace App\Http\Controllers\UserAddress;

use App\Http\Controllers\Controller;
use App\Models\Addresses\Addresses;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    public function attach(Request $request, User $user, Addresses $address): JsonResponse
    {
        try {
            $user->addresses()->attach($address->address_id);
            
            return response()->json([
                'message' => 'Dirección asignada correctamente',
                'user' => $user->load('addresses')
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al asignar la dirección',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remover una dirección de un usuario
     */
    public function detach(User $user, Addresses $address): JsonResponse
    {
        $user->addresses()->detach($address->address_id);
        
        return response()->json([
            'message' => 'Dirección removida correctamente',
            'user' => $user->load('addresses')
        ]);
    }

    /**
     * Obtener todas las direcciones de un usuario
     */
    public function getUserAddresses(User $user): JsonResponse
    {
        return response()->json([
            'addresses' => $user->addresses
        ]);
    }
}
