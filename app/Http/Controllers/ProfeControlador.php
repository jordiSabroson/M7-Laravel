<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;

class ProfeControlador extends Controller
{
    function show($id)
    {
        $profe = Usuari::find($id);

        return view('editar')->with('prof', $profe);
    }
}
