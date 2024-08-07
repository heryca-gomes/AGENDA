<?php

namespace App\Http\Controllers\Servidores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunosController extends Controller
{
    public function show()
    {
        $alunos = Aluno::with('usuario', 'curso')->get();

        return view('servidores.alunos.index')
            ->with('alunos', $alunos);
    }
}
