<?php

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::resource('unidades','UnidadMedidaController');
    Route::resource('insumos/semillas','SemillaController');
    Route::resource('proveedores','ProveedorController');
    Route::resource('ingresos','IngresoController');
    Route::get('reporteInventario', 'ReporteController@inventario');
});
