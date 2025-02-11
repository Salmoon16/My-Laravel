<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toko = Toko::all();
        return response()->json($toko);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pabrik_id' => 'required'
        ]);

        $toko = Toko::create([
            'name' => $request->name,
            'pabrik_id' => $request->pabrik_id,
        ]);

       return response()->json([
           'message' => 'Data ' . $toko->name . ' Berhasil Ditambahkan',
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $toko = Toko::findOrFail($id);

        if (!$toko) {
            return response()->json(['message' => 'toko not found'], 404);
        }

        return response()->json($toko);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $toko = Toko::find($id);

        if (!$toko) {
            return response()->json(['message' => 'toko not found'], 404);
        }

        $dataToko = $request->validate([
            'name' => 'required',
            'pabrik_id' => 'required'
        ]);

        $toko->update($dataToko);

        return response()->json([
            'message' => 'Data ' . $toko->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $toko = Toko::findOrFail($id);

        if (!$toko) {
            return response()->json(['message' => 'toko not found'], 404);
        }

        $toko->delete();

        return response()->json(['message' => $toko->name .' deleted successfully']);
    }
}
