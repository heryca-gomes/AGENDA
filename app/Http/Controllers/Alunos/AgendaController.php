<?php

namespace App\Http\Controllers\Alunos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Agenda;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AgendaController extends Controller
{
    public function getIDAluno()
    {
        $aluno = Aluno::where('usuario_id', Auth::id())->first();
        return $aluno->id;
    }

    /**
     * retorna a listagem de 
     *
     * @return void
     */
    public function index()
    {
        $agendamentos = Agenda::where('aluno_id', $this->getIDAluno())
            ->where('status', 2)
            ->orderBy('data', 'ASC')
            ->orderBy('horario', 'ASC')
            ->get();
        
        return view('alunos.agenda')
            ->with('agendamentos', $agendamentos);
    }

    /**
     * retorna a view com todos os horários disponíveis
     *
     * @return void
     */
    public function listarHorariosDisponiveis()
    {
        $horarios = Agenda::where('status', 1)
            //->where('data', '>=', Carbon::now())
            //->where('horario', '>', Carbon::now())
            ->orderBy('data', 'ASC')
            ->orderBy('horario', 'ASC')
            ->get();

        return view('alunos.horarios')
            ->with('horarios', $horarios);
    }

    /**
     * realiza o agendamento do horário
     *
     * @param [type] $horario
     * @return void
     */
    public function agendar($horario)
    {
        try{
            $horario = Agenda::find($horario);
            $horario->aluno_id = $this->getIDAluno();
            $horario->status = 2;
            $horario->save();
            session()->flash('global-success', true);
            return redirect()->route('aluno.agenda.index');
        }catch(Exception $e) {
            session()->flash('global-erro', true);
            return redirect()->back()->with('error', 'Erro ao agendar horário');
        }
    }

    /**
     * realiza o cancelamento do horário agendado
     *
     * @param int $horario
     * @return void
     */
    public function cancelar($horario)
    {
        try{
            $horario = Agenda::find($horario);
            $horario->status = 4;
            $horario->save();
            session()->flash('global-success', true);
            return redirect()->route('aluno.agenda.index');
        }catch(Exception $e) {
            session()->flash('global-erro', true);
            return redirect()->back()->with('error', 'Erro ao agendar horário');
        }
    }
}
