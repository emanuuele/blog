<?php

namespace App\Http\Controllers;

use App\Models\Usuario as ModelsUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class Usuario extends Controller
{
    public function signup(Request $request)
    {
        try {
            $user = ModelsUsuario::create([
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            return response()->view("signin", [
                "erro" => ""
            ]);
        } catch (\Exception $e) {
            return response()->view("signup", [
                "erro" => "Erro ao cadastrar usuário: " . $e->getMessage()
            ]);
        }
    }

    public function signin(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/signinForm');
        } else { 
            throw new Exception("Usuário não existe");
        }

        } catch (\Exception $e) {
            return response()->view("signin", [
                "erro" => "Erro ao fazer login: " . $e->getMessage()
            ]);
        }
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
