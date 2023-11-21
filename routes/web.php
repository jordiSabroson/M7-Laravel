<?php

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

    Route::get('/signin/{p1}/{p2}/{p3}/{p4}', function($p1, $p2, $p3, $p4) {
        $vista = $p1 . " " . $p2 . " " . $p3 . " " . $p4;
        return view('signin')->with('a', $vista);
    });
    
    Route::get('/signup/{p1}/{p2}/{p3}', function($p1, $p2, $p3) {
        $vista2 = $p1 . " " . $p2 . " " . $p3;
        return view('signup')->with('b', $vista2);
    });
});