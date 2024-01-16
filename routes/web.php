<?php

use App\Http\Controllers\PrimerControlador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EscolaControlador;
use App\Http\Controllers\UsuariControlador;
use App\Http\Controllers\ProfeControlador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Ruta POST del /login que utilitza la funció login del EscolaControlador i passa pel middleware CheckEmail    
Route::post('/login', [EscolaControlador::class, 'login'])->middleware('email')->name('comprovaCorreu.index');

Route::get('/hurra', function () {
    return "<h1>Usuari creat!</h1><br><a href='signin'>Iniciar sessió</a>";
})->name('totBe.index');

Route::prefix('sign')->group(function () {

    Route::get('/signin/{p1}/{p2}/{p3}/{p4}', [PrimerControlador::class, 'vista1']);

    Route::get('/signup/{p1}/{p2}/{p3}', [PrimerControlador::class, 'vista2']);
});


/************* PRÀCTICA 3 *************/
Route::get('/signin',  [EscolaControlador::class, 'signin']);

Route::get('/crearUsuari', function () {
    return view('crearUsuari');
});

Route::get('/professor', function () {
    return view('professor');
});

/************* PRÀCTICA 4 *************/
Route::controller(UsuariControlador::class)->group(function () {
    Route::get('/crearUsuari', 'mostrarCrearUsuari');
    Route::post('/crearUsuari', 'crearUsuari')->name('crearUsuari');
    Route::post('/signin', 'login');
});

/************* PRÀCTICA 5 *************/
Route::controller(ProfeControlador::class)->group(function () {
    Route::get('/prof', 'index')->name('prof.index');
    Route::get('/prof/edit/{id}', 'edit')->name('prof.edit');
    Route::get('/prof/crear', 'crear')->name('prof.crear');
    Route::post('/prof', 'guardar')->name('prof.guardar');
    Route::put('/prof/edit/{id}', 'modificar')->name('prof.modificar');
    Route::delete('/prof/delete/{id}', 'borrar')->name('prof.borrar');
    Route::post('/prof/pujar', 'pujar')->name('prof.pujar');
});
