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
    Route::resource('config/unidades','UnidadMedidaController');
    Route::resource('config/tipoAgroquimicos','TipoAgroquimicoController');
    Route::resource('config/tipoSemillas','TipoSemillaController');
    Route::resource('config/tipoMaquinarias','TipoMaquinariaController');
    Route::resource('insumos/semillas','SemillaController');
    Route::resource('insumos/agroquimicos','AgroquimicoController');
    Route::resource('insumos/abonos','AbonoController');
    Route::resource('proveedores','ProveedorController');
    Route::resource('trabajadores','TrabajadorController');
    Route::resource('destinatarios','DestinatarioController');
    Route::resource('config/tiposactividad','TipoActividadController');
    Route::resource('maquinarias','MaquinariaController');
    Route::resource('ingresos','IngresoController');
    Route::resource('salidas','SalidaController');
    Route::get('reporteInventario', 'ReporteController@inventario');
});
