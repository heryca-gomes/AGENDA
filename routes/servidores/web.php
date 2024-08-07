<?php

use App\Http\Controllers\Servidores\AgendaController;

Route::controller(AgendaController::class)->group(function(){
    Route::get('minha-agenda', 'index')->name('servidor.agenda.index');
    Route::get('horarios', 'showHorarios')->name('servidor.agenda.horarios');
    Route::post('store', 'store')->name('servidor.agenda.store');
    Route::get('cancelar/{horario}', 'cancelar')->name('servidor.agenda.cancelar');
});