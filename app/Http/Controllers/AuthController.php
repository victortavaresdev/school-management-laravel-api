<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidCredentialsException;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = $request->all();
        if (!Auth::attempt($credentials)) throw new InvalidCredentialsException();

        $user = User::where(['email' => $credentials['email']])->first();

        return [
            'accessToken' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ];
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'revoked' => true
        ];
    }

    public function profile(Request $request)
    {
        return $request->user();
    }
}
