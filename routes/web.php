<?php

use App\Http\Controllers\PrimerControlador;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::prefix('sign')->group(function() {

    Route::get('/signin/{p1}/{p2}/{p3}/{p4}', [PrimerControlador::class, 'vista1']);
    
    Route::get('/signup/{p1}/{p2}/{p3}', [PrimerControlador::class, 'vista2']);
});