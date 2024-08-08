<?php

use App\Http\Controllers\Servidores\ProntuariosController;

Route::controller(ProntuariosController::class)->prefix('prontuario')->group(function(){
    // parâmetro aluno pra identificar o prontuário de qual aluno eu tô procurando 
    Route::get('show/{aluno}', 'show')->name('servidores.prontuario.show');
    Route::post('store/{aluno}', 'store')->name('servidores.prontuario.store');
})->middleware('auth');