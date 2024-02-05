<?php

use App\Http\Controllers\Api\CargoController;
use App\Http\Controllers\FuncoesController;
use App\Http\Controllers\Api\ColaboradoresController;
use App\Http\Controllers\PontoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource('Colaboradores', ColaboradoresController::class);

//Rota para buscar o nome do cargo
Route::get('/cargos', [CargoController::class, 'index']);

//Rota para buscar o nome da função
Route::get('/funcoes', [FuncoesController::class, 'index']);

//Rota para registrar o ponto
Route::get('/registrarponto', [PontoController::class, 'registrar']);

//Rota para buscar os pontos 
Route::post('/buscarpontos', [PontoController::class, 'buscar']);



