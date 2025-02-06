<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alamat = Alamat::all();
        return response()->json($alamat);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $alamat = Alamat::create([
            'name'=> $request->name
        ]);
        return response()->json([
            'message' => 'Data ' . $alamat->name . ' Berhasil Ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alamat = Alamat::findOrFail($id);

        if (!$alamat) {
            return response()->json(['message' => 'Pesantren not found'], 404);
        }
        return response()->json($alamat);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alamat = Alamat::find($id);
        if (!$alamat) {
            return response()->json(['message' => 'Alamat not found'], 404);
        }
        $dataAlamat = $request->validate([
            'name' => 'required'
        ]);
        $alamat->update($dataAlamat);
        return response()->json([
            'message' => 'Data ' . $alamat->name . ' Berhasil Update',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alamat = Alamat::findOrFail($id);
        if (!$alamat) {
            return response()->json(['message' => 'Pesantren not found'], 404);
        }
        $alamat->delete();
        return response()->json(['message' => $alamat->name .' deleted successfully']);
    }
}
