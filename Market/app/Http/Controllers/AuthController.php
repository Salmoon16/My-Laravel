<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {

       try {
            $validated = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
               'error_message' => $e->getMessage()
            ]);
        }

        $user = User::where('email', $validated['email'])->first();

        Log::info($user);

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Password Atau Email Salah'
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
            'message' => 'Login Berhasil',
            'token' => $token
        ]);
    }

    public function logout(Request $request) {

        $user = $request->user();

        $user->tokens()->delete();

        return response()->json([
            'message' => $user->name.' Berhasil Logout'
        ]);

    }
}
