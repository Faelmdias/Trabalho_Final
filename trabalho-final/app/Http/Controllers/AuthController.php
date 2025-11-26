<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'senha');
        
        $usuario = Usuario::where('email', $credentials['email'])->first();

        if ($usuario && Hash::check($credentials['senha'], $usuario->senha)) {
            $request->session()->put('usuario_id', $usuario->id);
            $request->session()->put('usuario_nome', $usuario->nome);
            
            return redirect()->route('produtos.index')
                ->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')
            ->with('success', 'Logout realizado com sucesso!');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6|confirmed'
        ]);

        $validated['senha'] = Hash::make($validated['senha']);

        Usuario::create($validated);

        return redirect()->route('login')
            ->with('success', 'Cadastro realizado com sucesso!');
    }
}
