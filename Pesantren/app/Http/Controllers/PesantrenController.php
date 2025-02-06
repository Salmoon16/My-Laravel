<?php
namespace App\Http\Controllers;
use App\Models\Negara;
use App\Models\Pesantren;
use Illuminate\Http\Request;
class PesantrenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesantren = Pesantren::all();
        return response()->json($pesantren);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $pesantren = Pesantren::create([
            'name' => $request->name,
        ]);
       return response()->json([
           'message' => 'Data ' . $pesantren->name . ' Berhasil Ditambahkan',
       ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesantren = Pesantren::findOrFail($id);

        if (!$pesantren) {
            return response()->json(['message' => 'Pesantren not found'], 404);
        }
        return response()->json($pesantren);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesantren = Pesantren::find($id);
        if (!$pesantren) {
            return response()->json(['message' => 'Pesantren not found'], 404);
        }
        $dataPesantren = $request->validate([
            'name' => 'required'
        ]);
        $pesantren->update($dataPesantren);
        return response()->json([
            'message' => 'Data ' . $pesantren->name . ' Berhasil Update',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesantren = Pesantren::findOrFail($id);
        if (!$pesantren) {
            return response()->json(['message' => 'Pesantren not found'], 404);
        }
        $pesantren->delete();
        return response()->json(['message' => $pesantren->name .' deleted successfully']);
    }
}
