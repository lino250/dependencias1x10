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
use App\Exports\RepresentantesExport1x10;

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
    
       
        if($coordinaciones){

            return response()->json(['ok'=> 1,'coordinaciones' => $coordinaciones ]);

        }
        else{

            return response()->json(['ok'=> 0,'coordinaciones' => $coordinaciones ]);

        }


        
      
       
}

public function filtrarDependencias(Request $request)
{

        

    if (!is_null($request->dependencia_idr)) {
        $dependenciaId = $request->dependencia_idr;
    
        // Construir la consulta base
        $query = DB::table('representantes')
            ->select('representantes.id as id_representante','representantes.cedula as cedula_representante','representantes.nombres as nombre_representante','representantes.telefono as telefono_representante', 'dependencias.nombre as nombre_dependencia', 'coordinacions.nombre as nombre_coordinacion','parroquias.nombre as nombre_parroquia', 'centros.nombre as nombre_centro')
            ->leftJoin('parroquias', 'parroquias.id', '=', 'representantes.parroquia_id')
            ->leftJoin('centros', 'centros.id', '=', 'representantes.centro_id')
            ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
            ->where('dependencias.id', $dependenciaId);
    
        // Si se proporciona un coordinacion_id, unir la tabla de coordinaciones y agregar condición para coordinación
        if (!is_null($request->coordinacion_idr)) {
            $coordinacionId = $request->coordinacion_idr;
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
                 
    }
    else{

        $query = DB::table('representantes')
        ->select('representantes.id as id_representante','representantes.cedula as cedula_representante','representantes.nombres as nombre_representante','representantes.telefono as telefono_representante', 'dependencias.nombre as nombre_dependencia', 'coordinacions.nombre as nombre_coordinacion','parroquias.nombre as nombre_parroquia', 'centros.nombre as nombre_centro')
        ->leftJoin('parroquias', 'parroquias.id', '=', 'representantes.parroquia_id')
        ->leftJoin('centros', 'centros.id', '=', 'representantes.centro_id')
        ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
        ->leftJoin('coordinacions', 'coordinacions.id', '=', 'representantes.coordinacion_id');      

   }

    $representantes = $query->get();  

   
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
public function descargarReporte1x10()
{     
    //$resultadosBusquedai=[];

     // Verificar si la variable de sesión existe
     
     if (session()->has('representantes')) {
        // Obtener los resultados de la búsqueda de la sesión
        $representantes= session('representantes');        
        $resultadosBusquedai = collect();
        
            // Recorrer los representantes
        foreach ($representantes as $representante) {
           //dd($representante->cedula_representante);
           $representante = Representante::with('dependencia', 'coordinacion', 'parroquia','centro')
           ->find($representante->id_representante);

            //$representante = Representante::find($representante->id_representante);
            if ($representante) {

                if($representante->coordinacion)
                {
                    $coordinacionrep=$representante->coordinacion->nombre;
                }
                else{
                    $coordinacionrep="";
                }
              
                
                $integrantesRepresentante = $representante->integrantesR()->with('parroquia','centro')->get();


               

                if ($integrantesRepresentante->isEmpty()) { 
                    $resultadosBusquedai->push([
                        'cedula_rep' => $representante->cedula,
                        'nombre_rep' => $representante->nombres,
                        'telefono_rep' => $representante->telefono,
                        'dependencia' => $representante->dependencia->nombre,
                        'coordinacion' => $coordinacionrep,
                        'parroquia_rep' => $representante->parroquia->nombre,
                        'centro_rep' => $representante->centro->nombre,
                        // Agrega aquí otros datos relevantes del representante que desees incluir en la salida
                        'cedula_int' => '',
                        'nombre_int' => '',
                        'apellido_int' => '',
                        'telefono_int' => '',
                        'parroquia_int' => '',
                        'centro_int' => '',
                        // Agrega aquí otros datos relevantes del integrante que desees incluir en la salida
                        ]);  
                
                }
               
                
                else{
                    

                    foreach ($integrantesRepresentante as $integrante) {
                        

                        // Agregar los datos del integrante junto con los del representante a la colección de salida
                            $resultadosBusquedai->push([
                            'cedula_rep' => $representante->cedula,
                            'nombre_rep' => $representante->nombres,
                            'telefono_rep' => $representante->telefono,
                            'dependencia' => $representante->dependencia->nombre,
                            'coordinacion' => $coordinacionrep,
                            'parroquia_rep' => $representante->parroquia->nombre,
                            'centro_rep' => $representante->centro->nombre,
                            // Agrega aquí otros datos relevantes del representante que desees incluir en la salida
                            'cedula_int' => $integrante->cedula,
                            'nombre_int' => $integrante->nombres,
                            'apellido_int' => $integrante->apellidos,
                            'telefono_int' => $integrante->telefono,
                            'parroquia_int' => $integrante->parroquia->nombre,
                            'centro_int' => $integrante->centro->nombre,
                            // Agrega aquí otros datos relevantes del integrante que desees incluir en la salida
                            ]);
                            
                        } 
                }
                              
            }
        }        
        session()->put('integrantes1x10', $resultadosBusquedai);
        $integrantes1x10=Session::get('integrantes1x10');
        return Excel::download(new RepresentantesExport1x10($integrantes1x10), 'Listado_1x10.xlsx');
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