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
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.professor')->with('llistaAlumnes', $llistaAlum);
        } elseif ($usuari->rol == "Centre") {
            $llistaProf = Usuari::where('rol', 'Professor')->get();
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.centre')->with('llistaProfessors', $llistaProf)->with('llistaAlumnes', $llistaAlum);
        }
    }

    function borrar($id)
    {
        $usuari = Usuari::find($id);

        $usuari->delete();

        if ($usuari->rol === "Professor") {
            $llistaProf = Usuari::where('rol', 'Professor')->get();
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.centre')->with('llistaProfessors', $llistaProf)->with('llistaAlumnes', $llistaAlum);
        } elseif ($usuari->rol === "Alumne") {
            $llistaAlum = Usuari::where('rol', 'Alumne')->get();
            return view('escola.professor')->with('llistaAlumnes', $llistaAlum);
        } else {
            return redirect()->back()->with('error', 'Rol no válido');
        }
    }

    function pujar(Request $request) {
        $request->validate([
            'document' => 'required|mimes:jpg,png,pdf,doc,docx|max:10240', // Ajusta las extensiones y el tamaño según tus necesidades
        ]);

        $fitxer = $request->file('document');
        $ruta = $fitxer->store('documents/alumnes', 'public'); // Almacenar el archivo en la carpeta 'storage/app/documentos/alumnos'

        // // Ahora, puedes guardar la ruta del archivo en la base de datos para el alumno actual
        // $usuari = Usuari::find($id); // Asume que el alumno está autenticado
        // $usuari->ruta_document = 'documents/alumnes' . basename($ruta);
        // $usuari->save();

        return view('escola.alumne');
    }
}
