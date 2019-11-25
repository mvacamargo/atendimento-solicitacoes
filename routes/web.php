<?php

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
    return view('layouts.app');
});

Route::middleware(['auth'])->group(function () {
    //Solicitacao
    Route::resource('solicitacao', 'SolicitacaoController')->except([
        'create', 'store', 'show', 'destroy'
    ]);
    //Status
    Route::resource('status', 'StatusController')->except([
        'create', 'store', 'show', 'edit', 'update', 'destroy'
    ]);
    //Tipo de Servico
    Route::resource('tipoServico', 'TipoServicoController')->except([
        'show'
    ]);
    //Unidade de Tempo
    Route::resource('unidadeTempo', 'UnidadeTempoController')->except([
        'show'
    ]);
    //Complexidade
    Route::resource('complexidade', 'ComplexidadeController')->except([
        'show'
    ]);
    //Perfil do Usuario
    Route::get('/profile', 'Auth.RegisterController@show')->name('profile');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
