<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request) {

        $data = $request->validate([
            'name' => 'required|min:3|max:64',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed:passwordConfirmation',
                Password::defaults(),
            ],
            'passwordConfirmation' => 'required',
            'role' => 'required'
        ]);

        $user = new User();

        $user->password = $data['password'];
        $user->role = $data['role'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return response()->json([
            'message' => 'Użytkownik został utworzony poprawnie'
        ]);
    }

    public function login(Request $request) {

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Nieprawidłowe dane.'
            ], 401);
        }

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return response()->json([
            'access_token' => $token
        ]);
    }

    public function logout() {
        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Wylogowano poprawnie'
        ]);
    }
}
