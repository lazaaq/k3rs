<?php

namespace App\Http\Middleware;

use App\Models\Employee;
use App\Models\PersonalAccessToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class AuthApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('authorization');
        $token = substr($token, 7);
        $personal_access_token = PersonalAccessToken::where('token', $token)->first();
        if ($personal_access_token == null){
            return response([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }
        return $next($request);
    }
}
