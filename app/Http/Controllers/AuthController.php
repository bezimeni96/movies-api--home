<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return ['token' => $token];
    }
}
