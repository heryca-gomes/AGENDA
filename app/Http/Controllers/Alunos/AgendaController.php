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
    /**
     * Busca o ID de aluno a partir do ID do usuário logado
     * where() = onde o usuario_id(na tabela aluno) for igual ao id de usuário(na tabela usuário)
     * first() = Pega o primeiro resultado encontrado no banco
     * @return int
     */
    public function getIDAluno()
    {
        //Faz a consulta e salva na variável $aluno
        $aluno = Aluno::where('usuario_id', Auth::id())->first();

        // retorna o ID do aluno
        return $aluno->id;
    }

    /**
     * retorna a listagem de agendamentos sobe determinadas condições
     * O id de aluno deve ser o mesmo id de aluno que o usuário logado(Assim, só é possível ter
     * acesso aos próprios dados de agendamento)
     * o status de agendamento deve ser igual a 2, ou seja, somete os horários agendados
     * orderBy = ordenar a consulta 
     * Por fim, retorna a view onde os dados serão listados, passando junto o objeto 
     * @return void
     */
    public function index()
    {
        // Variável que irá receber o resultado da consulta, ou seja os agendamentos
        $agendamentos = Agenda::where('aluno_id', $this->getIDAluno())
            ->where('status', 2)
            ->orderBy('data', 'ASC')
            ->orderBy('horario', 'ASC')
            ->get();
        
        //View criadA para listagem dos dados
        return view('alunos.agenda')
            ->with('agendamentos', $agendamentos); //Passando o objeto pra view
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
            /**
             * Localiza a agenda(horário, agendamento[...]) no banco
             * Find = encontre. A consulta é feita por meio do ID, passado via URL, ou seja
             * Vai buscar o dado ao qual aquele ID corresponde no banco
             * Atribui os valores para cada atributos de agenda (ID do aluno, status)
             */
            $horario = Agenda::find($horario);
            $horario->aluno_id = $this->getIDAluno();
            $horario->status = 2;
            $horario->save(); // Salva as mudanças
            session()->flash('global-success', true);

            // redireciona para a rota de listagem dos agendamentos do aluno
            return redirect()->route('aluno.agenda.index');
        }catch(Exception $e) {
            session()->flash('global-erro', true);
            return redirect()->back()->with('error', 'Erro ao agendar horário');
        }
    }

    /**
     *  realiza o cancelamento do horário agendado
     *  Localiza a agenda(horário, agendamento[...]) no banco
     * @param int $horario
     * @return void
     */
    public function cancelar($horario)
    {
        try{
            // Localiza a agenda(horário, agendamento[...]) no banco
            $horario = Agenda::find($horario);
            // altera o status para 4 (status 4 = cancelado pelo aluno)
            $horario->status = 4;
            $horario->save(); // Salvas as mudanças
            session()->flash('global-success', true);

            // redireciona para a rota de listagem dos agendamentos do aluno
            return redirect()->route('aluno.agenda.index');
        }catch(Exception $e) {
            session()->flash('global-erro', true);
            return redirect()->back()->with('error', 'Erro ao agendar horário');
        }
    }
}
