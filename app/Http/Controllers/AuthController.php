<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = auth()->login($user);
        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' =>
                [
                    'token' => $token,
                    'type' => 'bearer'
                ]
        ]);

    }


    public function login(LoginRequest $request)
    {
        $inputs = $request->all();
        $token = Auth::attempt($inputs);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        };
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' =>
                [
                    'token' => $token,
                    'type' => 'bearer',
                ]
        ]);
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


}
