<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return response()->json(User::all());
    }

    public function login(Request $request){
        $fieleds = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $fieleds['email'])->first();

        if(!$user || !Hash::check($fieleds['password'], $user->password)){
            return response()->json([
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('inventoryapp')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);        
    }
}

