<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Http\Requests\Table\TableRequest;
use App\Http\Requests\Table\UpdateTableRequest;
use App\Models\Table\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return response()->json($tables);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableRequest $request)
    {
        $table = Table::create($request->validated());
        return response()->json($table, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $table = Table::findOrFail($id);
        return response()->json($table);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, $id)
    {
        $table = Table::findOrFail($id);
        $table->update($request->validated());
        return response()->json($table);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $table = Table::findOrFail($id);
        $table->delete();
        return response()->json(['message' => 'Table deleted successfully']);
    }
}
