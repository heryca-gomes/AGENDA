<?php

namespace App\Http\Controllers\Servidores;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Prontuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servidor;

class ProntuariosController extends Controller
{
    public function getIDServidor()
    {
        $servidor = Servidor::where('usuario_id', Auth::id())->first();
        return $servidor->id;
    }

    public function show($idAluno)
    {
        $aluno = Aluno::with('prontuario', 'usuario')->find($idAluno);
        $prontuario = Prontuario::where('aluno_id', $aluno->id)->first();

        return view('servidores.prontuario.index')
            ->with('aluno', $aluno)
            ->with('prontuario', $prontuario);
    }

    public function store(Request $request, $aluno)
    {
        try{
            $prontuario = Prontuario::where('aluno_id', $aluno)->first();
            $prontuario = $prontuario ?? new Prontuario();
            $prontuario->aluno_id = $aluno;
            $prontuario->servidor_id = $this->getIDServidor();
            $prontuario->observacao = $request->input('observacao');
            $prontuario->medicacao = $request->input('medicacao');
            $prontuario->terapia = $request->input('terapia');

            $prontuario->save();
            
            session()->flash('global-success', true);
            return redirect()->back();
        }catch(\Exception $e) {
            return $e->getMessage();
            session()->flash('global-erro', true);
            return redirect()->back();
        }
    }
}
