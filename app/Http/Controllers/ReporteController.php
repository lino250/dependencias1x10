<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Parroquia;
use App\Models\Integrante;
use App\Models\Representante;
use App\Models\Dependencia;

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

    /*public function filtrarDependencias(Request $request)
    {
        $query = Dependencia::query();

            // Aplicar el filtro por ID de dependencia si se proporciona
        if ($request->has('dependencia_id')) {
            $query->where('id', $request->dependencia_id);
        }

        // Aplicar el filtro por ID de coordinación si se proporciona
        if ($request->has('coordinacion_id')) {
            // Utilizar la relación 'coordinaciones' para filtrar por ID de coordinación
            $query->whereHas('coordinacions', function ($query) use ($request) {
                $query->where('dependencia_id', $request->dependencia_id);
            });
            dd($query);
        }

        // Obtener los resultados de la consulta
        $dependencia = $query->first();
//dd($dependencia);
        // Si se encuentra la dependencia, acceder a los representantes de las coordinaciones filtradas
        if ($dependencia) {
            // Obtener las coordinaciones filtradas con sus representantes
            $coordinaciones = $dependencia->coordinacions()->with('representantes')->get();
           //  dd ($coordinaciones);
            // Devolver los resultados
            return response()->json(['dependencia' => $dependencia, 'coordinaciones' => $coordinaciones]);
        } else {
            // Si no se encuentra la dependencia, devolver un mensaje de error
            return response()->json(['error' => 'No se encontró la dependencia'], 404);
        }
        return view('reporte.index', compact('$representante'));

    }*/

    public function filtrarDependencias(Request $request)
{
    // Obtener el ID de la dependencia y de la coordinación desde la solicitud
    $query = Representante::query();


    if($request->has('dependencia'))
    {
        $dependenciaId = $request->dependencia;
        $coordinacionId = $request->coordinacion;
        $query->whereHas('coordinacion.dependencia', function ($q) use ($dependenciaId) {
            $q->where('id', $dependenciaId);
            });    


    }
    if($request->has('coordinacion'))
    {
        $query->where('coordinacion_id', $coordinacionId);

    

    }
    if($request->has('representante'))
    {      

        $representanteId = $request->representante;
        $query->where('id', $representanteId);

    } 
    

    //dd($query->get());

    

    // Consultar los representantes que pertenecen a la dependencia y la coordinación filtradas
    /*$representantes = Representante::whereHas('coordinacion', function ($query) use ($coordinacionId) {
        $query->where('coordinacion_id', $coordinacionId);
     
    })->whereHas('coordinacion.dependencia', function ($query) use ($dependenciaId) {
        $query->where('dependencia_id', $dependenciaId);
    })->get();
    dd($representantes);

    // Devolver los representantes encontrados
    return response()->json($representantes);*/
}
}