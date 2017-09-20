<?php

Route::get('/', 'HomeController@getIndex')->name('index.home');

Route::prefix('/{empresa}')->group(function () {
    //Rotas não autenticadas (apenas login)
    Route::get('/login', 'empresa\login\LoginController@getLogin')->name('get.login.empresa');
    Route::post('/login', 'empresa\login\LoginController@postLogin')->name('post.login.empresa');
    Route::get('/logout', 'empresa\login\LoginController@getLogout')->name('get.logout.empresa');

    //Rotas autenticadas
    //Menu
    Route::get('/', 'empresa\CompanyController@index')->name('index.empresa')->middleware('e.login');
    Route::get('/dashboard', 'empresa\CompanyController@index')->name('index.empresa')->middleware('e.login');
    Route::get('/clientes', 'empresa\CustomerController@index')->name('index.usuario')->middleware('e.login');
    Route::get('/processos', 'empresa\ProccessController@index')->name('index.usuario')->middleware('e.login');
    Route::get('/agenda', 'empresa\CalendarController@index')->name('index.usuario')->middleware('e.login');
    Route::get('/usuarios', 'empresa\UserController@index')->name('index.usuario')->middleware('e.login');

    //Clientes
    Route::get('/clientes/novo', 'empresa\CustomerController@getCreate')->name('get.novo.cliente')->middleware('e.login');
    Route::post('/clientes/novo', 'empresa\CustomerController@postCreate')->name('post.novo.cliente')->middleware('e.login');
    Route::get('/clientes/editar/{id}', 'empresa\CustomerController@getEdit')->name('get.editar.cliente')->middleware('e.login');
    Route::post('/clientes/editar/{id}', 'empresa\CustomerController@postEdit')->name('post.editar.cliente')->middleware('e.login');

    //Processos

    //Agenda

    //Usuarios
    Route::get('/usuarios/novo', 'empresa\UserController@getCreate')->name('get.novo.usuario')->middleware('e.login');
    Route::post('/usuarios/novo', 'empresa\UserController@postCreate')->name('post.novo.usuario')->middleware('e.login');
    Route::get('/usuarios/editar/{id}', 'empresa\UserController@getEdit')->name('get.editar.usuario')->middleware('e.login');
    Route::post('/usuarios/editar/{id}', 'empresa\UserController@postEdit')->name('post.editar.usuario')->middleware('e.login');
    //Ajax
    Route::post('/usuarios/view', 'empresa\UserController@ajaxView')->name('ajax.view.usuario')->middleware('e.login');
});