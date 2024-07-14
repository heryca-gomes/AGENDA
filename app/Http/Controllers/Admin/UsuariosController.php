<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipoAcesso = TipoUsuario::all();
        $usuarios = User::all();

        return view('admin.usuarios.index')
            ->with('tipos', $tipoAcesso)
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            User::create([
                'acesso_id' => $request->acesso_id,
                'name' => $request->input('name'),
                'nome_completo' => $request->input('nome_completo'),
                'CPF' => $request->input('cpf'),
                'email' => $request->input('email'),
                'password' => Hash::make('teste123')
            ]);
    
            return redirect()->route('usuario.index');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $usuario = User::find($id);
            
            $usuario->update([
                'acesso_id' => $request->input('acesso_id'),
                'name' => $request->input('name'),
                'nome_completo' => $request->input('nome_completo'),
                'CPF' => $request->input('cpf'),
                'email' => $request->input('email'),
                'password' => Hash::make('teste123')
            ]);
            
            session()->flash('global-success', true);
            return redirect()->route('usuario.index');

        }catch (\Exception $e) {
            session()->flash('global-erro', true);
            return redirect()->back()->with('error', 'Erro ao atualizar usuário');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
