<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request) {
        Log::info($request->all());
        $validated = $request->validate([
            "email"=> "required|email",
            "password"=> "required|password",
            ]);
            $user = User::where("email", $validated['email'])->first();

            if (!$user || !Hash::check($validated['password'], $user->password)) {
                throw ValidationException::withMessages(['message'=> 'Email atau Password Ngawur']);
            }

            $token = $user->createToken("authToken")->plainTextToken;

            return response()->json([
            "data" => $user,
            "message" => "gass",
            "token" => $token
            ]);
    }

    public function logout(Request $request) {
    }
}
