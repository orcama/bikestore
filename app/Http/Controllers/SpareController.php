<?php

namespace App\Http\Controllers;

use App\Models\Spare;
use Illuminate\Http\Request;

class SpareController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $spares = Spare::all(); // Get all spares
        return response()->json($spares);
    }

    // Show the form for creating a new resource (optional)
    public function create()
    {
        // You can return a view if you're using blade templates, but for an API, we don't need this
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validasi inputan
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Menyimpan sparepart baru
        $sparepart = Spare::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ]);

        return response()->json($sparepart, 200);
    }

    // Display the specified resource
    public function show($id)
    {
        // Find spare by ID
        $spare = Spare::findOrFail($id);
        return response()->json($spare);
    }

    // Show the form for editing the specified resource (optional)
    public function edit($id)
    {
        // You can return a view if you're using blade templates, but for an API, we don't need this
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Find spare by ID and update
        $spare = Spare::findOrFail($id);
        $spare->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // Return the updated spare
        return response()->json($spare);
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        // Find spare by ID and delete
        $spare = Spare::findOrFail($id);
        $spare->delete();

        // Return a success message
        return response()->json(['message' => 'Spare deleted successfully']);
    }
}
