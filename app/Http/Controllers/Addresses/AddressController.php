<?php

namespace App\Http\Controllers\Addresses;

use App\Http\Controllers\Controller;
use App\Http\Requests\Addresses\AddressRequest;
use App\Http\Requests\Addresses\UpdateAddressRequest;
use App\Models\Addresses\Addresses;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Addresses::all(); 
        return response()->json($addresses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $address = Addresses::create($request->validated());
        return response()->json($address, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $address = Addresses::findOrFail($id);
            return response()->json($address, Response::HTTP_OK);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Direccion no encontrada'
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAddressRequest $request, $id)
    {
        $address = Addresses::findOrFail($id);
        $address->update($request->validated());
        return response()->json($address);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Addresses::findOrFail($id)->delete();
            return response()->json(['message' => 'Direccion eliminada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar la Direccion']);
        }
    }
}
