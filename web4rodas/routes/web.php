<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\MotoristaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\CalendarioController;

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



/*Motorista*/
Route::get('/motorista/motorista', [MotoristaController::class, 'motorista']);
Route::get('/motorista/criar_motorista', [MotoristaController::class, 'criar_motorista']);
Route::post('/motorista/motorista', [MotoristaController::class, 'store']);
Route::get('/motorista/editar_motorista/{id}', [MotoristaController::class, 'editar_motorista']);
Route::get('/motorista/atualizar_motorista/{id}', [MotoristaController::class, 'atualizar_motorista']);
Route::delete('/motorista/motorista/{id}', [MotoristaController::class, 'apagar_motorista']);



Route::get('/inicial', function () {
    return view('incial');
});

/*Agendamento*/
Route::get('/agendar', [AgendamentosController::class, 'index']);
Route::Post('/agendar', [AgendamentosController::class, 'store']);


/*Calendário */
Route::get('calendario', [CalendarioController::class, 'index']);



Route::get('/login', function () {
    return view('welcome');
});


Auth::routes();

/*Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');*/

Route::group(['middleware' => 'auth'], function () {
	/*Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);*/


});

