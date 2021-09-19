<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Berhasil Login!',
            ],401);
        }

        $token = $user->createToken('token');

        return response()->json([
            'success' => true,
            'message' => 'Authorized',
            'user' => $user,
            'token' => $token->plainTextToken
        ], 200);
    }

    public function logout()
    {
        
    }
    
}
