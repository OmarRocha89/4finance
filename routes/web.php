<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', function () {
    return view('auth.login');
});

Route::get('estado-cuenta',[DocumentController::class,'document']);
Route::get('consultar',[DocumentController::class,'api']);




Auth::routes();

Route::get('/facturas', [App\Http\Controllers\HomeController::class, 'facturas'])->name('facturas');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/clientes', [App\Http\Controllers\HomeController::class, 'vistaClientes'])->name('clientes');
Route::get('/info-clientes/{id}', [App\Http\Controllers\HomeController::class, 'vistaInfoClientes'])->name('infoclientes');
Route::get('/operaciones/{id}', [App\Http\Controllers\HomeController::class, 'vistaInfoOperaciones'])->name('operaciones');
Route::get('/datos-cortes/{id}', [App\Http\Controllers\HomeController::class, 'vistaInfoCorte'])->name('cortes');

Route::get('/estados-cuenta', [App\Http\Controllers\HomeController::class, 'estados']);

Route::get('/info-operaciones/{id}', [App\Http\Controllers\HomeController::class, 'infoOperaciones']);

Route::get('/info-corte/{id}', [App\Http\Controllers\HomeController::class, 'infoCorte']);

Route::get('/datos-clientes/{id}', [App\Http\Controllers\HomeController::class, 'datos']);

Route::get('/todos-clientes', [App\Http\Controllers\HomeController::class, 'datos2']);

Route::get('/todas-facturas', [App\Http\Controllers\HomeController::class, 'TodasFacturas']);

Route::get('/descargar/{id}', [App\Http\Controllers\HomeController::class,'descargarFacturas']);

Route::get('/cancelar/{id}', [App\Http\Controllers\HomeController::class,'cancelarFacturas']);

Route::get('/info-acuse/{id}', [App\Http\Controllers\HomeController::class,'acuse']);

Route::get('/acuse/{id}', [App\Http\Controllers\HomeController::class,'vistaAcuse']);



