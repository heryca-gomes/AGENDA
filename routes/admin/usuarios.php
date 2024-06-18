<?php

use App\Http\Controllers\Admin\UsuariosController;

Route::controller(UsuariosController::class)->prefix('usuarios')->group(function(){
    Route::get('show', 'index')->name('usuario.index')->middleware('admin');
    Route::post('store', 'store')->name('usuario.store');
    Route::post('update/{id}', 'update')->name('usuario.update');
});