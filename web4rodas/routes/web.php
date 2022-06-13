<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgendamentosController;

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


/*Carro*/
Route::get('/veiculo/carro', [CarroController::class, 'index']);
Route::get('/veiculo/criar_carro', [CarroController::class, 'criar_carro']);
Route::post('/veiculo/carro', [CarroController::class, 'store']);
Route::get('/veiculo/editar_carro/{id}', [CarroController::class, 'editar_carro']);
Route::get('/veiculo/atualizar_carro/{id}', [CarroController::class, 'atualizar_carro']);
Route::delete('/veiculo/carro/{id}', [CarroController::class, 'apagar_carro']);

Route::get('/veiculo/carro', [CarroController::class, 'index']);

Route::get('/inicial', function () {
    return view('incial');
});

/*Agendamento*/
Route::get('/agendar', [AgendamentosController::class, 'index']);
Route::Post('/agendar', [AgendamentosController::class, 'store']);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

