<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Http\Resources\SalesResource;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SalesResource::collection(Sale::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'item_name' => 'required|string|max:255', 
            'description' => 'required|string', 
            'quantity' => 'required|integer', 
            'price' => 'required|integer',
            'payment_method' => 'required|string',
            
        ]); 
        $sale->update($request->all());

        return Sale::create($request->all()); 

    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return new SalesResource($sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([ 
            'item_name' => 'string|max:255', 
            'description' => 'string', 
            'quantity' => 'integer', 
            'price' => 'integer',
            'payment_method' => 'string',
            
        ]); 
        $sale->update($request->all());

        return new SalesResource($sale); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete(); 
        return response()->json(null, 204);
        // is the same as return response()->noContent();

    }
}
