<?php

use App\Http\Controllers\AgroquimicoController;
use App\Http\Controllers\DestinatarioController;
use App\Http\Controllers\FertilizanteController;
use App\Http\Controllers\FungicidaController;
use App\Http\Controllers\HerbicidaController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\InsecticidaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\SemillaController;
use App\Http\Controllers\TipoAgroquimicoController;
use App\Http\Controllers\TipoSemillaController;
use App\Http\Controllers\UnidadMedidaController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::middleware('auth')->group(function (){
    Route::resource('/config/unidades', UnidadMedidaController::class);
    Route::resource('/config/tipoAgroquimicos', TipoAgroquimicoController::class);
    Route::resource('/config/tipoSemillas', TipoSemillaController::class);
    Route::resource('/config/tipoMaquinarias', TipoMaquinariaController::class);
    Route::resource('/insumos/semillas', SemillaController::class);
    Route::resource('/insumos/agroquimicos', AgroquimicoController::class);
    Route::resource('/insumos/herbicidas', HerbicidaController::class);
    Route::resource('/insumos/insecticidas', InsecticidaController::class);
    Route::resource('/insumos/fungicidas', FungicidaController::class);
    Route::resource('/insumos/fertilizantes', FertilizanteController::class);
    Route::resource('/insumos/abonos', AbonoController::class);
    Route::resource('/proveedores', ProveedorController::class);
    Route::resource('/trabajadores', TrabajadorController::class);
    Route::resource('/destinatarios', DestinatarioController::class);
    Route::resource('/config/tiposactividad', TipoActividadController::class);
    Route::resource('/maquinarias', MaquinariaController::class);
    Route::resource('/ingresos', IngresoController::class);
    Route::get('/salidasagrupadas', [SalidaController::class, 'index2']);
    Route::get('/salidasagrupadas/{id}', [SalidaController::class, 'show2']);
    Route::resource('/salidas', SalidaController::class);
});