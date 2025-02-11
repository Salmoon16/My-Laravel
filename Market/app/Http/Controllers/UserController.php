<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Container\Attributes\Log as AttributesLog;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        Log::info('IUNI LOG 1');

        $user = User::all();
        Log::info('IUNI LOG 2');

        Log::info('IUNI LOG 3');
        return response()->json($user);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'toko_id' => 'required',
                'email' => 'required',
                'name' => 'required',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
               'error_message' => $e->getMessage()
            ]);
        }

        var_dump('OK INI RUNNING DSNI');

        $user = User::create([
            'toko_id' => $request->toko_id,
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password
        ]);

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
            return response()->json(['message' => 'User not found'], 900);
        }

        return response()->json($user);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::findOrFail($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

       try {
            $dataUser = $request->validate([
                'toko_id' => 'nullable',
                'email' => 'nullable',
                'name' => 'nullable',
                'password' => 'nullable'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
               'error_message' => $e->getMessage()
            ]);
        }
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
