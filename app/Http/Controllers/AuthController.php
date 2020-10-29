<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Str;


use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = [
        'email' => $request->get('email'),
        'password' => $request->get('password'),
        ];

        $token = auth('api')->attempt($credentials);
        if (!$token) {
            abort(401, 'Invalid credentials');
        }

        $user = JWTAuth::user();

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function refreshToken() {
        return [
            'token' => auth('api')->refresh(true)
        ];
    }

    public function logout() {
        return auth('api')->logout(true);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            "name" => $data['name'],
            "email" => $data['email'],
            "email_verified_at" => now(),
            "password" => Hash::make($data['password']),
            "remember_token" => Str::random(10),
        ]);
        return $user;
    }
}
