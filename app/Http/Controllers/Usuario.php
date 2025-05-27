<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario as ModelsUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usuario extends Controller
{
    public function signup(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'senha' => 'required|string|min:6|confirmed',
        ]);

        $user = ModelsUsuario::create([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'senha' => bcrypt($validated['senha']),
        ]);

        return response()->json(["success" => true]);
    }

    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'senha' => 'required|string',
        ]);

        $user = ModelsUsuario::where('email', $credentials['email'])->first();

        // Correção aqui: comparar senha
        if (!$user || !Hash::check($credentials['senha'], $user->senha)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function signinForm()
    {
        return response()->view("signin");
    }
    public function signupForm()
    {
        return response()->view("signup");
    }

    public function logout(Request $request)
    {

        return response()->json(["success" => true, "message" => "Logged out successfully"]);
    }
}
