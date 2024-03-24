<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Coordinacion;
use App\Models\Parroquia;
use App\Models\Integrante;
use App\Models\Representante;
use App\Models\Dependencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    //

    public function index()
    {
        
      
        /*$dependencia=Auth::user()->dependencia;
        if($dependencia)
        {
            $dependenciaId=Auth::user()->dependencia->id;       

            $dependencias= Dependencia::find($dependenciaId);   
       
       
            if($dependencia->id){
                
                $coordinaciones = DB::table('dependencias')
                ->select('coordinacions.id', 'coordinacions.nombre as nombre_coordinacion')
                ->join('coordinacions', 'coordinacions.dependencia_id', '=', 'dependencias.id')
                ->where('dependencias.id', $dependencia->id)                
                ->get();       
                
                $coordinaciones = $coordinaciones->pluck('nombre_coordinacion', 'id')->toArray();
            }        

        }
        else{

            $coordinaciones = Coordinacion::pluck('nombre','id');
            $dependencias = Dependencia::pluck('nombre','id');
           
        }*/
        list($coordinaciones, $dependencias) = $this->cargarDatosIndex();
        return view('reporte.index', compact('coordinaciones', 'dependencias'));           
            
     
    }
    public function cargarDatosIndex(){


        $dependencia=Auth::user()->dependencia;
        if($dependencia)
        {
            $dependenciaId=Auth::user()->dependencia->id;       

            $dependencias= Dependencia::find($dependenciaId);   
       
       
            if($dependencia->id){
                
                $coordinaciones = DB::table('dependencias')
                ->select('coordinacions.id', 'coordinacions.nombre as nombre_coordinacion')
                ->join('coordinacions', 'coordinacions.dependencia_id', '=', 'dependencias.id')
                ->where('dependencias.id', $dependencia->id)                
                ->get();       
                
                $coordinaciones = $coordinaciones->pluck('nombre_coordinacion', 'id')->toArray();
            }        

        }
        else{

            $coordinaciones = Coordinacion::pluck('nombre','id');
            $dependencias = Dependencia::pluck('nombre','id');
           
        }

        return array($coordinaciones, $dependencias);






    }


    public function obtenerCoordinacionesDependencia($dependenciaId)
    {
        $dependencia = Dependencia::find($dependenciaId);

        if($dependencia->id){
                
            $coordinaciones = DB::table('dependencias')
            ->select('coordinacions.id', 'coordinacions.nombre as nombre_coordinacion')
            ->join('coordinacions', 'coordinacions.dependencia_id', '=', 'dependencias.id')
            ->where('dependencias.id', $dependencia->id)                
            ->get();       
            
            $coordinaciones = $coordinaciones->pluck('nombre_coordinacion', 'id')->toArray();
        }        


            $mensaje='Si hay coordinaciones';
            return response()->json([
                'coordinaciones' => $coordinaciones,
                'mensajes' => $mensaje,
            ]);
           

    
}

public function filtrarDependencias(Request $request)
{
    //$query = Representante::query();
// list($coordinaciones, $dependencias, $representantes) = $this->cargarDatosIndex();

if ($request->has('dependencia_id') && $request->has('coordinacion_id')) {
    $dependenciaId = $request->dependencia_id;
    $coordinacionId = $request->coordinacion_id;

    $representantes = DB::table('representantes')
    ->select('representantes.*')

    ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
      ->join('coordinacions', 'coordinacions.id', '=', 'representantes.coordinacion_id')
      ->where('dependencias.id', $dependenciaId)
      ->where('coordinacions.id', $coordinacionId)->get();

}


        return view('reporte.representantes', compact('representantes'));




}
}