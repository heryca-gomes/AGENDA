<?php

use App\Http\Controllers\Servidores\AlunosController;

Route::controller(AlunosController::class)->prefix('alunos')->group(function(){
    Route::get('show', 'show')->name('servidores.alunos.show');
});