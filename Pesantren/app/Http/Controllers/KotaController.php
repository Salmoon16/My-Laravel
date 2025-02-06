<?php
namespace App\Http\Controllers;
use App\Models\Kota;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kota = Kota::all();
        return response()->json($kota);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $kota = Kota::create([
            'name' => $request->name,
        ]);
       return response()->json([
           'message' => 'Data ' . $kota->name . ' Berhasil Ditambahkan',
       ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kota = Kota::findOrFail($id);

        if (!$kota) {
            return response()->json(['message' => 'Kota not found'], 404);
        }
        return response()->json($kota);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kota = Kota::find($id);
        if (!$kota) {
            return response()->json(['message' => 'Kota not found'], 404);
        }
        $dataKota = $request->validate([
            'name' => 'required'
        ]);
        $kota->update($dataKota);
        return response()->json([
            'message' => 'Data ' . $kota->name . ' Berhasil Update',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kota = Kota::findOrFail($id);
        if (!$kota) {
            return response()->json(['message' => 'Kota not found'], 404);
        }
        $kota->delete();
        return response()->json(['message' => $kota->name .' deleted successfully']);
    }
}
