<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;

class UsuariControlador extends Controller
{
    function consultaUsuaris()
    {

        $usuaris = Usuari::all();

        return view('login')->with('usuaris', $usuaris);
    }

    function mostrarCrearUsuari()
    {
        return view('crearUsuari');
    }

    function crearUsuari()
    {

        $usuari = new Usuari();

        $usuari->nom = request('nom');
        $usuari->cognoms = request('cognoms');
        $usuari->password = request('password');
        $usuari->email = request('email');
        $usuari->rol = request('rol');
        $usuari->actiu = request('actiu');

        $usuari->save();

        return view('login');
    }

    function login()
    {
        $usuari = new Usuari();

        $usuari->email = request('email');
        $usuari->password = request('password');

        //
    }
}
