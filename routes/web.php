<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Planillas;
use App\Http\Livewire\Empleados;
use App\Http\Livewire\Sueldos;
use App\Http\Livewire\Tributos;

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

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/home', 'livewire.empresas.index')->middleware('auth');

//Route Hooks - Do not delete//
	Route::view('datos', 'livewire.datos.index')->middleware('auth');
	Route::view('users', 'livewire.users.index')->middleware('auth');
	Route::view('descuentos', 'livewire.descuentos.index')->middleware('auth');
	//Route::view('tributos', 'livewire.tributos.index')->middleware('auth');
	Route::get('tributos/{planilla}', Tributos::class)->middleware('auth');
	Route::get('/tributos-pdf/{idplanilla}', [Tributos::class, 'pdf'])->middleware('auth');
	Route::get('/tributos-excel/{idplanilla}', [Tributos::class, 'excel'])->middleware('auth');
	//Route::view('sueldos', 'livewire.sueldos.index')->middleware('auth');
	Route::get('sueldos/{planilla}', Sueldos::class)->middleware('auth');
	Route::get('/sueldos-pdf/{idplanilla}', [Sueldos::class, 'pdf'])->middleware('auth');
	Route::get('/sueldos-excel/{idplanilla}', [Sueldos::class, 'excel'])->middleware('auth');
	Route::get('/boleta-pdf/{id}', [Sueldos::class, 'boleta'])->middleware('auth');
	//Route::get('planillas', Planillas::class)->middleware('auth');
	Route::get('planillas/{empresa}', Planillas::class)->middleware('auth');
	//Route::view('empleados', 'livewire.empleados.index')->middleware('auth');
	Route::get('empleados/{empresa}', Empleados::class)->middleware('auth');
	Route::view('empresas', 'livewire.empresas.index')->middleware('auth');