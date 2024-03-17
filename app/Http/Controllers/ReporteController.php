<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Parroquia;
use App\Models\Integrante;
use App\Models\Representante;

class ReporteController extends Controller
{
    //

    public function index()
    {      
        return view('reporte.index');              
    }
    /*public function filtrarDependencias(Request $request)
    {
      
        $dependenciaId = $request->input('dependencia');

        dd($dependenciaId);

        // Obtener los integrantes según la dependencia seleccionada
        $integrantes = Integrante::whereHas('representante', function ($query) use ($dependenciaId) {
            $query->where('dependencia_id', $dependenciaId);
        })->get();

       // return view('reporte.index', compact('integrantes'));  
        //return view('reporte.index');              
    }*/

    public function filtrarDependencias(Request $request)
    {
        
        $query = Integrante::query();
        dd($query);
      
        // Filtrar por dependencia si se proporciona
        if ($request->has('dependencia')) {
            $query->where('dependencia_id', $request->dependencia);
    
            // Filtrar por coordinación si se proporciona
            if ($request->has('coordinacion')) {
                $coordinacion_id = $request->coordinacion;
                // Obtener el representante asociado a la coordinación
                $representante = Coordinacion::find($coordinacion_id)->representante;
    
                // Filtrar por representante si se encontró
                if ($representante) {
                    $query->where('representante_id', $representante->id);
                }
            }
        }
        return view('reporte.index', compact('$representante'));

 
    }
}