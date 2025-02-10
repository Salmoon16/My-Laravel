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
        $pondok = Pabrik::all();
        return response()->json($pondok);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $pondok = Pabrik::create([
            'name' => $request->name,
        ]);

       return response()->json([
           'message' => 'Data ' . $pondok->name . ' Berhasil Ditambahkan',
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pondok = Pabrik::findOrFail($id);

        if (!$pondok) {
            return response()->json(['message' => 'Pondok not found'], 404);
        }

        return response()->json($pondok);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pondok = Pabrik::find($id);

        if (!$pondok) {
            return response()->json(['message' => 'Pondok not found'], 404);
        }

        $dataPondok = $request->validate([
            'name' => 'required'
        ]);

        $pondok->update($dataPondok);

        return response()->json([
            'message' => 'Data ' . $pondok->name . ' Berhasil Update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pondok = Pabrik::findOrFail($id);

        if (!$pondok) {
            return response()->json(['message' => 'Pondok not found'], 404);
        }

        $pondok->delete();

        return response()->json(['message' => $pondok->name .' deleted successfully']);
    }
}
