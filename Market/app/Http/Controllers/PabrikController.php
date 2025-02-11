<?php

namespace App\Http\Controllers;

use App\Models\Pabrik;
use Illuminate\Http\Request;

class PabrikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pabrik = Pabrik::all();
        return response()->json($pabrik);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $pabrik = Pabrik::create([
            'name' => $request->name,
        ]);

       return response()->json([
           'message' => 'Data ' . $pabrik->name . ' Berhasil Ditambahkan',
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pabrik = Pabrik::findOrFail($id);

        if (!$pabrik) {
            return response()->json(['message' => 'pabrik not found'], 404);
        }

        return response()->json($pabrik);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pabrik = Pabrik::find($id);

        if (!$pabrik) {
            return response()->json(['message' => 'pabrik not found'], 404);
        }

        $dataPabrik = $request->validate([
            'name' => 'required'
        ]);

        $pabrik->update($dataPabrik);

        return response()->json([
            'message' => 'Data ' . $pabrik->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pabrik = Pabrik::findOrFail($id);

        if (!$pabrik) {
            return response()->json(['message' => 'pabrik not found'], 404);
        }

        $pabrik->delete();

        return response()->json(['message' => $pabrik->name .' deleted successfully']);
    }
}
