<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return $this->responseSuccess('User login successfully.', [
                'user' => $user,
                'token' => $token,
            ]);
        } else {
            return response()->json([
                'code' => 422,
                'success' => false,
                'data' => null,
                'message' => "Email dan Password yang Anda Masukkkan Belum Sesuai"
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
