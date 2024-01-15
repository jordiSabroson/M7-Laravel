<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;

class ProfeControlador extends Controller
{

    function index()
    {
        $llistaProfessors = Usuari::where('rol', 'Professor')->get();
        return view('escola.centre')->with('llistaProfessors', $llistaProfessors);
    }

    function crear()
    {
        return view('professor.add');
    }

    function edit($id)
    {
        $profe = Usuari::find($id);

        return view('professor.editar')->with('prof', $profe);
    }

    function guardar(Request $request)
    {
        $usuari = new Usuari();

        $usuari->nom = $request->nom;

        $usuari->save();

        $llistaProf = Usuari::where('rol', 'Professor')->get();
        return view('escola.centre')->with('llistaProfessors', $llistaProf);
    }

    function modificar($id)
    {
        $usuari = Usuari::find($id);

        $usuari->nom = request('nom');
        $usuari->cognoms = request('cognoms');
        $usuari->password = request('password');
        $usuari->email = request('email');
        $usuari->rol = request('rol');
        $usuari->actiu = request('actiu');

        $usuari->save();

        if ($usuari->rol == "Alumne") {
            return view('escola.alumne');
        } elseif ($usuari->rol == "Professor") {
            return view('escola.professor');
        } elseif ($usuari->rol == "Centre") {
            $llistaProf = Usuari::where('rol', 'Professor')->get();
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            $email = Usuari::where('email', $usuari->email)->get();
            return view('escola.centre')->with('llistaProfessors', $llistaProf)->with('llistaAlumnes', $llistaAlum)->with('email', $email);
        }
    }

    function borrar ($id) {
        $usuari = Usuari::find($id);

        $usuari->delete();

        $usuari->rol = request('rol');
        $llistaProf = Usuari::where('rol', 'Professor')->get();
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
        return view('escola.centre')->with('llistaProfessors', $llistaProf)->with('llistaAlumnes', $llistaAlum);
    }
}
