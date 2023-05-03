<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('candidato')->group(function () {

	Route::post('/carregar', [\App\Http\Controllers\CandidatoController::class, 'carregarDados']);

	Route::post('/cadastrarEditar', [\App\Http\Controllers\CandidatoController::class, 'cadastrarEditar']);

});

Route::prefix('vaga')->group(function () {

	Route::post('/carregar', [\App\Http\Controllers\VagaController::class, 'carregarDados']);

	Route::post('/cadastrarEditar', [\App\Http\Controllers\VagaController::class, 'cadastrarEditar']);

});

Route::post('/confirmarExclusao', [\App\Http\Controllers\ExclusaoController::class, 'confirmarExclusao']);

Route::post('/excluirDado', [\App\Http\Controllers\ExclusaoController::class, 'excluirDado']);