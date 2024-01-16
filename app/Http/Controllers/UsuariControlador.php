<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;
use Illuminate\Support\Facades\Auth;

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

        return to_route('totBe.index');
    }

    function login()
    {
        $email = request('email');
        $password = request('password');

        $usuario = Usuari::where('email', $email)->first();

        if ($usuario && $usuario->password === $password) {
            switch ($usuario->rol) {
                case ('Alumne'):
                    return view('escola.alumne')->with('email', $email);
                    break;
                case ('Professor'):
                    $llistaAlum = Usuari::where('rol', 'Alumne')->get();
                    return view('escola.professor')->with('llistaAlumnes', $llistaAlum);
                    break;
                case ('Centre'):
                    $llistaProfessors = Usuari::where('rol', 'Professor')->get();
                    $llistaAlum = Usuari::where('rol', 'Alumne')->get();
                    return view('escola.centre')->with('llistaAlumnes', $llistaAlum)->with('llistaProfessors', $llistaProfessors);
                    break;
            }
        } else {
            return view('error');
        }
    }
}
