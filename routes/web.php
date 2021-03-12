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

Route::get('/login', ['uses' => 'Controller@fazerLogin'])->name('login');
Route::post('/login', ['as'=> 'user.login','uses' => 'DashboardController@auth']);

Route::get('/logout', ['as'=> 'user.logout','uses' => 'DashboardController@logoutAuth'])->name('logout');


Route::get('/dashboard', ['as'=> 'user.dashboard','uses' => 'DashboardController@index'])->middleware(['auth','check.is.admin']);

Route::resource('user','UsersController')->middleware('auth');
Route::resource('cliente','ClientesController')->middleware('auth');

Route::resource('/relatorio','RelatorioController')->middleware('auth');
Route::post('relatorio','RelatorioController@searchInstrutor')->name('relatorio.search')->middleware('auth');

Route::resource('/presenca','PresencasController')->middleware('auth');

Route::resource('/relatorioPresenca','RelatorioPresencaController')->middleware('auth');
Route::post('relatorioPresenca', 'RelatorioPresencaController@searchPresenca')->name('relatorioPresenca.search')->middleware('auth');

