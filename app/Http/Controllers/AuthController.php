<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only("email", "password");

        if (!($token = JWTAuth::attempt($credentials))) {
            return response()->json(["error" => "Invalid credentials"], 401);
        }

        return response()->json([
            "token" => $token,
            "user" => Auth::user(),
        ]);
    }

    public function register(Request $request)
    {
        // Validate registration data
        $request->validate([
            "name" => "required|string",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string",
        ]);

        // Create the user
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        // Generate a JWT token for the new user (optional)
        $token = JWTAuth::fromUser($user);

        return response()->json(
            [
                "message" => "User registered successfully",
                "user" => $user,
                "token" => $token, // Include the token if you want auto-login after registration
            ],
            201
        );
    }

    public function getUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(["error" => "User not found"], 404);
        }
        return response()->json($user);
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(["message" => "Logged out successfully"]);
    }

    public function refreshToken()
    {
        $newToken = JWTAuth::refresh(JWTAuth::getToken());
        return response()->json(["token" => $newToken]);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
