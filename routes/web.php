<?php

use Illuminate\Support\Facades\Route; // Add this line
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\AlunosController;// Add this line
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Main Page Route
//Route::get('/', [HomePage::class, 'index'])->name('pages-home');
Route::post('sign-in', [AuthController::class, 'Authenticate'])->name('sign-in');

Route::get('/', function(){
    return redirect()->route('auth-login-basic');
});

Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');

//Route::middleware(['admin'], function(){
    Route::prefix('admin')->group(base_path('routes/admin/usuarios.php'));
    Route::prefix('admin')->group(base_path('routes/admin/alunos.php'));
    Route::prefix('admin')->group(base_path('routes/admin/servidores.php'));

//});

Route::prefix('servidores')->group(base_path('routes/servidores/alunos.php'));
Route::prefix('servidores')->group(base_path('routes/servidores/web.php'));
Route::prefix('alunos')->group(base_path('routes/alunos/web.php'));
