<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $validated['email'])->first();
        

        if(!$user || !Hash::check($validated['password'], $user->password)){
            return response()->json([
                'status' => false,
                'message' => "Username or Password invalid"
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login Success',
            'data' => $user,
            'token' => $token,
        ]);
    }

    public function register(Request $request){
        
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged Out'
        ]);
    }

    public function verifyToken(Request $request){
        $user = $request->user()->currentAccessToken();

        if(!$user){
            return response()->json([
                'status' => false,
                'message' => 'Invalid Token'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Valid Token'
        ]);
    }
}
