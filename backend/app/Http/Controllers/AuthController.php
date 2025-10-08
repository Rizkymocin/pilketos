<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolPic;
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
        $validated = $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'password' => 'required|min:8|confirmed',
            'school' => 'required'
        ]);


        $user = User::create($validated);
        $school = School::where('public_id', $validated['school']['id'])->firstOrCreate([
            'public_id' => $validated['school']['id'],
            'school_name' => $validated['school']['sekolah'],
            'address' => $validated['school']['alamat_jalan'] . ' ' . $validated['school']['kecamatan'] . ' ' . $validated['school']['kabupaten_kota'] . ' ' . $validated['school']['propinsi'],
            'principal_name' => '',
        ]);

        $user->assignRole('pic');

        $pic = SchoolPic::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'school_id' => $school->id,
            'occupation' => 'Pengurus/Pembina Osis'
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Registered Succesfully',
            'data' => $user
        ]);
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


    public function getUserRole(Request $request){
        $user = $request->user()->load('roles');

        return response()->json([
            'roles' => $user->roles->pluck('name')
        ]);
    }
}
