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
Route::get('/', ['uses' => 'Controller@homepage']);
Route::get('/cadastro', ['uses' => 'Controller@cadastrar']);

Route::get('/login', ['uses' => 'Controller@fazerLogin']);
Route::post('/login', ['as'=> 'user.login','uses' => 'DashboardController@auth']);
Route::get('/dashboard', ['as'=> 'user.dashboard','uses' => 'DashboardController@index']);

Route::resource('user','UsersController');
Route::resource('cliente','ClientesController');

Route::resource('/relatorio','RelatorioController');
Route::post('relatorio','RelatorioController@searchInstrutor')->name('relatorio.search');

Route::resource('/presenca','PresencasController');

Route::resource('/relatorioPresenca','RelatorioPresencaController');
Route::post('relatorioPresenca', 'RelatorioPresencaController@searchPresenca')->name('relatorioPresenca.search');

