<?php
Route::prefix('alunos')->group(function(){
    Route::get('show', function(){
        return view('servidores.alunos.index');
    });
});