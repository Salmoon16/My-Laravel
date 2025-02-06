<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info($request->all());
        $request->validate([
            'pesantren_id' => 'required',
            'name' => 'required',
            'email'=> 'required',
            'password'=> 'required',
        ]);
        Log::info("ini data yang terkirim");
        $user = User::create([
            'pesantren_id' => $request->pesantren_id,
            'name' => $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
                ]);
                Log::info("ini data yang terkirim");
        return response()->json([
            'message' => 'Data ' . $user->name . ' Berhasil Ditambahkan',
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info("ini data yang terkirim");
        Log::info("function update running");
        $user = User::findOrFail($id);
        Log::info("ini data yang akan dikirim" . $user);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        Log::info("ini jalan");
        $dataUser = $request->validate([
            'name' => 'required',
                ]);
        Log::info("ini jalan");
        $user->update($dataUser);
        return response()->json([
            'message' => 'Data ' . $user->name . ' Berhasil Update',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => $user->name .' deleted successfully']);
    }
}
