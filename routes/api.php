<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use App\Models\Profissional;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::post('servico/store',[ServicoController::class,'store']);

Route::put('servico/update',[ServicoController::class, 'update']);

Route::get('servico/find/{id}',[ServicoController::class,'pesquisarPorId']);

Route::post('servico/nome',[ServicoController::class, 'pesquisarPorNome']);

Route::delete('servico/remover/{id}',[ServicoController::class, 'excluir']);

Route::post('servico/descricao',[ServicoController::class, 'pesquisarPorDescricao']);

Route::put('servico/update',[ServicoController::class, 'update']);

Route::get('servico/all', [ServicoController::class, 'retornarTodos']);




Route::post('cliente/store',[ClienteController::class,'store']);

Route::put('cliente/update',[ClienteController::class, 'update']);

Route::get('cliente/find/{id}',[ClienteController::class,'pesquisarPorId']);

Route::post('cliente/nome',[ClienteController::class,'pesquisarPorNome']);

Route::post('cliente/cpf',[ClienteController::class,'pesquisarCpf']);

Route::post('cliente/celular',[ClienteController::class,'pesquisarCelular']);

Route::post('cliente/email',[ClienteController::class,'pesquisarEmail']);

Route::get('cliente/all',[ClienteController::class, 'retornarTodos']);




Route::post('profissional/store',[ProfissionalController::class,'store']);

Route::get('profissional/find/{id}',[ProfissionalController::class,'pesquisarPorId']);

Route::post('profissional/nome',[ProfissionalController::class,'pesquisarPorNome']);

Route::put('profissional/update',[ProfissionalController::class, 'update']);

Route::post('profissional/cpf',[ProfissionalController::class,'pesquisarCpf']);

Route::post('profissional/celular',[ProfissionalController::class,'pesquisarCelular']);

Route::post('profisional/email',[ProfissionalController::class,'pesquisarEmail']);

Route::get('profissional/all',[ProfissionalController::class, 'retornarTodos']);


Route::post('Agenda/store',[AgendaController::class,'store']);

