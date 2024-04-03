<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Centro;
use App\Models\Coordinacion;
use App\Models\Parroquia;
use App\Models\Integrante;
use App\Models\Representante;
use App\Models\Dependencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RepresentantesExport;


class ReporteController extends Controller
{
    //
    

    public function index()
    {
        
      
        $dependencia=Auth::user()->dependencia;
        if($dependencia)
        {
            $dependenciaId=Auth::user()->dependencia->id;       

            $dependencias= Dependencia::find($dependenciaId);  
            
            $coordinaciones = Session::get('coordinaciones', []);
       
       
            if($dependencia->id){
                
                $coordinaciones = DB::table('dependencias')
                ->select('coordinacions.id', 'coordinacions.nombre as nombre_coordinacion')
                ->join('coordinacions', 'coordinacions.dependencia_id', '=', 'dependencias.id')
                ->where('dependencias.id', $dependencia->id)                
                ->get();     
                
                $coordinaciones = $coordinaciones->pluck('nombre_coordinacion', 'id')->toArray();
              
                //$representantes = Representante::where('dependencia_id', $dependenciaId->id)->paginate(10);
                    
                             

                Session::put('coordinaciones', $coordinaciones);
            }
            Session::put('dependencias', $dependencias);        

        }
        else{

            $coordinaciones = Coordinacion::pluck('nombre','id');
            $dependencias = Dependencia::pluck('nombre','id');
            //$representantes = Representante::paginate(10);

            Session::put('coordinaciones', $coordinaciones);
            Session::put('dependencias', $dependencias);    
           
        }
        
        return view('reporte.index', compact('coordinaciones', 'dependencias'));           
            
     
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
   // dd('HOLAAAAAAAAAAA');

    if (!is_null($request->dependencia_id)) {
        $dependenciaId = $request->dependencia_id;
    
        // Construir la consulta base
        $query = DB::table('representantes')
            ->select('representantes.cedula as cedula_representante','representantes.nombres as nombre_representante','representantes.telefono as telefono_representante', 'dependencias.nombre as nombre_dependencia', 'coordinacions.nombre as nombre_coordinacion','parroquias.nombre as nombre_parroquia', 'centros.nombre as nombre_centro')
            ->leftJoin('parroquias', 'parroquias.id', '=', 'representantes.parroquia_id')
            ->leftJoin('centros', 'centros.id', '=', 'representantes.centro_id')
            ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
            ->where('dependencias.id', $dependenciaId);
    
        // Si se proporciona un coordinacion_id, unir la tabla de coordinaciones y agregar condición para coordinación
        if (!is_null($request->coordinacion_id)) {
            $coordinacionId = $request->coordinacion_id;
            $query->join('coordinacions', function($join) use ($coordinacionId) {
                $join->on('coordinacions.id', '=', 'representantes.coordinacion_id')
                    ->where('coordinacions.id', $coordinacionId);
            });
        } else {
            // Si no se proporciona un coordinacion_id, utilizar leftJoin para permitir representantes sin coordinación
            $query->leftJoin('coordinacions', 'coordinacions.id', '=', 'representantes.coordinacion_id');
        }
    
        // Agrupar por el ID del representante, el nombre de la dependencia y el nombre de la coordinación para evitar duplicados
        $query->groupBy('representantes.id', 'dependencias.nombre', 'coordinacions.nombre','parroquias.nombre' ,'centros.nombre');
    
        // Ejecutar la consulta
        $representantes = $query->get();
        
    }
  //dd($representantes);
    // Almacenar las coordinaciones en la sesión
    // Recuperar las coordinaciones de la sesión
 

    session()->put('representantes', $representantes);
    $coordinacionesSession = Session::get('coordinaciones');

    // Recuperar las dependencias (asumo que ya las tienes disponibles)
    $dependenciasSession =  Session::get('dependencias'); 
    // Redireccionar de vuelta al índice con las variables necesarias
    return redirect()->route('reporte.index')->with([
        'coordinaciones' => $coordinacionesSession,
        'dependencias' => $dependenciasSession,
        //'representantes' => $representantes, // Añadir representantes al conjunto de datos
    ]);

    
   // dd(Session::put('representantes', $representantes));
}

public function descargarReporteExcel()
{       
    //dd(Session::get('representantes'));
   // $data = Session::get('representantes'); // Obtener los representantes de la sesión   
    //dd($data);
    //return $this->export($data);

     // Verificar si la variable de sesión existe
     
     if (session()->has('representantes')) {
        // Obtener los resultados de la búsqueda de la sesión
        $resultadosBusqueda = session('representantes');
        
       // dd($resultadosBusqueda);
        // Aquí puedes realizar cualquier otra acción que necesites con los resultados de la búsqueda

        // Por ejemplo, podrías pasar los resultados a tu clase RepresentantesExport para generar el archivo Excel
        return Excel::download(new RepresentantesExport($resultadosBusqueda), 'Listado.xlsx');
    } else {
        // Si no hay resultados de búsqueda en la sesión, puedes redirigir al usuario o manejarlo de alguna otra manera
        return redirect()->back()->with('error', 'No hay resultados de búsqueda disponibles para exportar');
    }
}

/*public function export($data) 
{
    return Excel::download(new RepresentantesExport($data), 'invoices.xlsx');
}*/


/*public function generarReporteExcel($data/*, $totalRepresentantes)
{
    //return Excel::download(function($excel) use ($data, $totalRepresentantes) {
    //$excel->sheet('Reporte', function($sheet) use ($data, $totalRepresentantes) {
    return Excel::download(function($excel) use ($data) {
        $excel->sheet('Reporte', function($sheet) use ($data) {
            // Agregar fila de total de representantes
            /*$sheet->appendRow([
                'Total de Representantes:', // Etiqueta de total
                $totalRepresentantes, // Total de representantes
                '', // Celdas vacías para completar las columnas restantes
                '',
                ''
            ]);

            // Agregar espacio en blanco entre el total y los datos
            $sheet->appendRow(['']);

            // Agregar encabezado
            $encabezado = [
                "Cedula",
                "Nombre Representante",
                "Parroquia",
                "Centro"
            ];
            $sheet->prependRow(3, $encabezado);

            // Agregar datos
            $sheet->fromArray($data, null, 'A4', false, false);
        });
    }, 'reporte.xlsx');
}*/


}