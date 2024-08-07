<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 

class AuthController extends Controller
{
    public function Authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $tipoUsuario = Auth::user()->acesso_id;
            
            $rota = match($tipoUsuario){
                1 => 'usuario.index',
                2 => 'servidor.agenda.index',
                3 => 'aluno.agenda.index'
            };
            
            return redirect()->route($rota);
        }
 
        return back()->withErrors([
            'email' => 'Os dados informados não foram encontrados em nossa base dados!',
        ])->onlyInput('email');
    }
}
