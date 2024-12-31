<?php
namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    // Login method
    public function login(Request $request)
{
    try {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('SCD')->accessToken;
            return response()->json(['token' => $token]);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    } catch (\Exception $e) {
        Log::error('Login error: ' . $e->getMessage());
        return response()->json(['message' => 'Internal Server Error'], 500);
    }
}

}