<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AveriaController;
use App\Http\Controllers\MaterialeController;
use App\Http\Controllers\ParteController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::resource('empleados', 'App\Http\Controllers\EmpleadoController')->middleware("auth");

Route::get("clientes/listado/{cliente_id}",[ClienteController::class, 'listado']);
Route::resource('clientes', 'App\Http\Controllers\ClienteController')->middleware("auth");


Route::resource('averias', 'App\Http\Controllers\AveriaController')->middleware("auth");
Route::resource('materiales', 'App\Http\Controllers\MaterialeController')->middleware("auth");
Route::get("partes/pdf",[ParteController::class, 'listadoPdf'])->name("partes.pdf"); 
Route::resource('partes', 'App\Http\Controllers\ParteController')->middleware("auth");

