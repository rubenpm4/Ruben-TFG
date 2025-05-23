<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClasificacionController extends Controller
{
    public function primera()
    {
        // Aquí puedes pasar datos de ejemplo
        return view('clasificacion.primera');
    }

    public function segunda()
    {
        // Aquí puedes pasar datos de ejemplo
        return view('clasificacion.segunda');
    }
}
