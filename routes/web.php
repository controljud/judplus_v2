<?php

Route::get('/', 'HomeController@getIndex')->name('index.home');

//Ajax
Route::get('/endereco/cidade', 'HomeController@getCidade')->name('ajax.get.cidade');

//Clientes
Route::get('/clientes/listar-todos', 'empresa\CustomerController@listar_todos');
Route::get('/usuarios/listar-todos', 'empresa\UserController@listar_todos');

Route::prefix('/{empresa}')->group(function () {
    //Rotas não autenticadas (apenas login)
    Route::get('/login', 'empresa\login\LoginController@getLogin')->name('get.login.empresa');
    Route::post('/login', 'empresa\login\LoginController@postLogin')->name('post.login.empresa');
    Route::get('/logout', 'empresa\login\LoginController@getLogout')->name('get.logout.empresa');

    //Rotas autenticadas
    //Menu
    Route::get('/', 'empresa\CompanyController@index')->name('index.empresa')->middleware('e.login');
    Route::get('/dashboard', 'empresa\CompanyController@index')->name('index.empresa')->middleware('e.login');
    Route::get('/clientes', 'empresa\CustomerController@index')->name('index.clientes')->middleware('e.login');
    Route::get('/processos', 'empresa\ProccessController@index')->name('index.processos')->middleware('e.login');
    Route::get('/agenda', 'empresa\CalendarController@index')->name('index.agenda')->middleware('e.login');
    Route::get('/usuarios', 'empresa\UserController@index')->name('index.usuarios')->middleware('e.login');

    //Clientes
    Route::get('/clientes/editar', 'empresa\CustomerController@getEdit')->name('get.editar.cliente')->middleware('e.login');
    Route::get('/clientes/editar/{id}', 'empresa\CustomerController@getEdit')->name('get.editar.cliente')->middleware('e.login');
    Route::post('/clientes/editar', 'empresa\CustomerController@postEdit')->name('post.editar.cliente')->middleware('e.login');

    //Processos

    //Agenda

    //Usuarios
    Route::get('/usuarios/editar', 'empresa\UserController@getEdit')->name('get.editar.usuario')->middleware('e.login');
    Route::get('/usuarios/editar/{id}', 'empresa\UserController@getEdit')->name('get.editar.usuario')->middleware('e.login');
    Route::post('/usuarios/editar', 'empresa\UserController@postEdit')->name('post.editar.usuario')->middleware('e.login');
});