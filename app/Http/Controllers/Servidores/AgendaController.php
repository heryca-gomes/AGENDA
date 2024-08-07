<?php

namespace App\Http\Controllers\Servidores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use App\Models\Servidor;
use Exception;

class AgendaController extends Controller
{
    
    public function getIDServidor()
    {
        $servidor = Servidor::where('usuario_id', Auth::id())->first();
        return $servidor->id;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       

        $agendamentos = Agenda::with(['aluno' => function($q){
            $q->with('usuario');
        }])->where("servidor_id", $this->getIDServidor())
            ->where('status', 2)
            ->orderBy('data', 'ASC')
            ->orderBy('horario', 'ASC')
            ->get();

        return view('servidores.minha-agenda')
            ->with('agendamentos', $agendamentos);
    }

    public function showHorarios()
    {
       $horarios = Agenda::where('servidor_id', $this->getIDServidor())->get();

       return view('servidores.horarios')
        ->with('horarios', $horarios);
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
            $horario = Agenda::create([
                'servidor_id' => $this->getIDServidor(),
                'aluno_id' => null,
                'data' => $request->input('data'),
                'horario' => $request->input('horario'),
                'status' => 1
            ]);

            session()->flash('global-success', true);
            return redirect()->route('servidor.agenda.horarios');
        } catch(Exception $e) {
            session()->flash('global-erro', true);
            return redirect()->back()->with('error', 'Erro ao cadastrar horário');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
            $horario->status = 5;
            $horario->save();
            session()->flash('global-success', true);
            return redirect()->route('servidor.agenda.index');
        }catch(Exception $e) {
            return $e->getMessage();
            session()->flash('global-erro', true);
            return redirect()->back()->with('error', 'Erro ao agendar horário');
        }
    }
}
