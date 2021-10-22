<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\PersonalAccessToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = Employee::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $token = $user->createToken('token');
        $personal_access_token = PersonalAccessToken::where('tokenable_id', $user->id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Authorized',
            'user' => Employee::select('name', 'email', 'address')->where('email', $request->email)->first(),
            'token' => $personal_access_token->token,
        ], 200);
    }

    public function logout()
    {
        
    }
    
}
