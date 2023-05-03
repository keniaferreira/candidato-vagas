<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::post('logar', [\App\Http\Controllers\LoginController::class, 'logar']);

Route::prefix('login')->group(function () {

	Route::get('/', function () {
		return view('painel');
	});		

});

Route::get('logout', [\App\Http\Controllers\LoginController::class, 'sair']);

Route::middleware(['auth.usuario'])->prefix('produto')->group(function () {

	Route::get('listar', [\App\Http\Controllers\ProdutoController::class, 'listar']);
	Route::get('editar-cadastrar', [\App\Http\Controllers\ProdutoController::class, 'exibirFormCadastrarEditar']);	
	Route::get('apagar', [\App\Http\Controllers\ProdutoController::class, 'exibirFormConfirmarDeletar']);

});

Route::middleware(['auth.usuario'])->group(function () {

	Route::prefix('candidato')->group(function () {

		Route::get('/', [\App\Http\Controllers\CandidatoController::class, 'listar']);
		Route::get('editar-cadastrar', [\App\Http\Controllers\CandidatoController::class, 'exibirFormCadastrarEditar']);	
		Route::get('apagar', [\App\Http\Controllers\CandidatoController::class, 'exibirFormConfirmarDeletar']);
		
	});

	Route::prefix('vaga')->group(function () {

		Route::get('/', [\App\Http\Controllers\VagaController::class, 'listar']);
		Route::get('editar-cadastrar', [\App\Http\Controllers\VagaController::class, 'exibirFormCadastrarEditar']);	
		Route::get('apagar', [\App\Http\Controllers\VagaController::class, 'exibirFormConfirmarDeletar']);
		
	});

});