<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        $request['password'] = Hash::make($request->password);

        $user = User::create($request->all());
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    public function login(AuthLoginRequest $request)
    {        
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
                'user' => new UserResource($user),
                'token' => $token,
                'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {        
        if ($request->user()->currentAccessToken()->delete()) {
            return response()->json([
                'message' => 'logout successfully'
            ], 200);
        }

        return response()->json([
            'message' => 'logout error'
        ], 404);
    }
}
