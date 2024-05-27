<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Centro;
use App\Models\Coordinacion;
use App\Models\Dependencia;
use App\Models\Parroquia;
use App\Models\Representante;
use App\Models\Integrante;
use App\Models\Voto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
 * Class RepresentanteController
 * @package App\Http\Controllers
 */
class RepresentanteController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $dependenciaId=Auth::user()->dependencia;
        if ($dependenciaId) {
            $representantes = Representante::where('dependencia_id', $dependenciaId->id)->paginate(10);
            
        }else{
            $representantes = Representante::paginate(10);
        }
        return view('representante.index', compact('representantes'))
        ->with('i', ($representantes->currentPage() - 1) * $representantes->perPage());
     
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
  
          // Obtén la cédula de la URL
        $cedula = $request->input('cedula');
            
        $representante = new Representante();
        $parroquias = Parroquia::pluck('nombre','id');       
        $centros = Centro::pluck('nombre','id');
        
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
        
      //  return view('reporte.index', compact('coordinaciones', 'dependencias'));    
       // $coordinaciones = Coordinacion::pluck('nombre','id');
       // $dependencias = Dependencia::pluck('nombre','id');

        //return view('representante.create', compact('representante','parroquias','centros','coordinaciones','dependencias'));
         // Pasa la cédula a la vista
        return view('representante.create', compact('representante', 'parroquias', 'centros', 'coordinaciones', 'dependencias', 'cedula'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

    //dd($request);
    // Modifica las reglas de validación de Representante::$rules para hacer el campo opcional
    $rules = Representante::$rules;
    $rules['telefono_alternativo'] = 'nullable|string'; // Hacer el campo opcional
    $rules['nombres'] = 'required|string'; // Hacer el campo de nombres obligatorio

    // Validación de la solicitud
    $request->validate($rules);

    // Crea el representante con los datos proporcionados en la solicitud
    $representante = Representante::create($request->all());
    $votoReprensentante = Voto::create([
        'campo1' => $request->,
        'campo2' => $request->valorCampo2,
        // Agrega aquí más campos si es necesario
    ]);
    // Redirecciona a la vista index de representantes con un mensaje de éxito
    return redirect()->route('representante.index')->with('success', 'Representante creado exitosamente.');
}

    public function buscarRepresentante(Request $request)
    {
        $dependenciaId = Auth::user()->dependencia;
        $cedula = $request->input('cedula');
        $mensaje='';
        $consulta = DB::table('representantes')
            ->select('representantes.*', 'coordinacions.nombre as nombre_coordinacion', 'parroquias.nombre as nombre_parroquia', 'centros.nombre as nombre_centro', 'dependencias.nombre as nombre_dependencia')
            ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
            ->leftJoin('coordinacions', 'coordinacions.id', '=', 'representantes.coordinacion_id')
            ->join('parroquias', 'parroquias.id', '=', 'representantes.parroquia_id')
            ->join('centros','centros.id', '=', 'representantes.centro_id')        
            ->where('representantes.cedula', $cedula);
    
        $representantes = $consulta->get();
    
        if ($representantes->isEmpty()) {  
            // El representante no fue encontrado
            return response()->json([
                'showModal' => 1                   
            ]);
        }
    
        if ($dependenciaId) {  
            $dependenciaId = $dependenciaId->id;  
            //$representantesDependencia = $representantes->where('dependencia_id', $dependenciaId);
            $representantePertenece = $representantes->contains('dependencia_id', $dependenciaId);
            if (!$representantePertenece) { 
                // El representante no pertenece a la dependencia del usuario
                $mensaje = "El Representante de 1x10 buscado pertenece a una dependencia distinta a la que usted ha accedido";
                return response()->json([
                    'mensaje' => $mensaje
                ]);
            }
        }
       //$representantes = $representante;
        $rutas = [
            'show' => route('representante.show', $representantes->first()->id),
            'edit' => route('representante.edit', $representantes->first()->id),
            'destroy' => route('representante.destroy', $representantes->first()->id)
        ];
        
        return response()->json([
            'mensaje' => $mensaje,
            'showModal' => 0,
            'representantes' => $representantes,
            'dependenciaId' => $dependenciaId,
            'rutas' => $rutas
        ]);
    
    }

    public function show($id)
    {
        $representante = Representante::find($id);  
        $parroquias = $representante->parroquia;
        $centros = $representante->centro;
        $this->buscarIntegrante($id);
        $dependencia= $representante->dependencia;
        $coordinacion= $representante->coordinacion;
        return view('representante.show', compact('representante','parroquias','centros','coordinacion','dependencia'))->with('id',$id);
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $representante = Representante::find($id);
        $parroquias = Parroquia::pluck('nombre','id');
        $centros = Centro::pluck('nombre','id');
       // $coordinaciones = Coordinacion::pluck('nombre','id');
        //$dependencias = Dependencia::pluck('nombre','id');
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
        return view('representante.edit', compact('representante','centros','coordinaciones','dependencias', 'parroquias'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Representante $representante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representante $representante)
    {
        $representante->update($request->all());
        return redirect()->route('representante.index')
        ->with('success', 'Datos del Representante editados con éxito');
    }

    /*
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        // Encontrar el representante por su ID
        $representante = Representante::findOrFail($id);
        // Obtener los IDs de los integrantes asociados al representante
        $integrantes_ids = $representante->integrantesR()->pluck('integrante_id');
        // Eliminar los integrantes asociados de la tabla integrantes
        Integrante::whereIn('id', $integrantes_ids)->delete();
        // Eliminar todos los integrantes asociados al representante de la tabla pivot
        $representante->integrantesR()->detach();
        // Eliminar al representante
        $representante->delete();
        // $representante = Representante::find($id)->delete();
        return redirect()->route('representante.index')
        ->with('success', 'Representante elimnado exitosamente');
    }
    public function buscarIntegrante($id){
        $representante = Representante::find($id);
        if ($representante) {     
            $integrantes = $representante->integrantesR()->with('parroquia')->get();
            return $integrantes;
        }
    }
    public function obtenerCentros($parroquiaId)
    {
        $parroquia = Parroquia::find($parroquiaId);
        $centros = $parroquia->centros;
        if ($centros->isEmpty()) {
            $mensaje="No hay centros asociados a esta parroquia.";
        } else {
            $mensaje='Si Hay CEntros';
            return response()->json([
                'centros' => $centros,
                'mensajes' => $mensaje,
            ]);
        }
        // Devolver los centros como respuesta JSON
    }

    public function obtenerRepCoordinacionesDependencia($dependenciaId)
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
}
