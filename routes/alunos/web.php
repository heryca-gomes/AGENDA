<?php
use App\Http\Controllers\Alunos\AgendaController;

Route::controller(AgendaController::class)->group(function(){
    Route::get('minha-agenda', 'index')->name('aluno.agenda.index');
    Route::get('horarios', 'listarHorariosDisponiveis')->name('aluno.horarios.disponiveis');
    Route::get('agendar/{horario}', 'agendar')->name('aluno.horarios.agendar');
    Route::get('cancelar/{horario}', 'cancelar')->name('aluno.horarios.cancelar');
});