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


    //Processos

    //Agenda

    //Usuarios
    Route::get('/usuarios/novo', 'empresa\UserController@getCreate')->name('get.novo.usuario')->middleware('e.login');
    Route::post('/usuarios/novo', 'empresa\UserController@postCreate')->name('post.novo.usuario')->middleware('e.login');
});