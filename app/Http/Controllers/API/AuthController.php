<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = Employee::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Unauthorized',
            ],401);
        }

        $token = $user->createToken('token');

        return response()->json([
            'message' => 'Authorized',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function logout()
    {
        
    }
    
}
