<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Coordinacion;
use App\Models\Dependencia;
use App\Models\Parroquia;
use App\Models\Representante;
use App\Models\Integrante;
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
        ->with('i', (request()->input('page', 1) - 1) * $representantes->perPage());    
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
        $coordinaciones = Coordinacion::pluck('nombre','id');
        $dependencias = Dependencia::pluck('nombre','id');

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
        // Modifica las reglas de validación de Representante::$rules para hacer el campo opcional
        $rules = Representante::$rules;
        $rules['telefono_alternativo'] = 'nullable|string'; // Hacer el campo opcional
    
        // Validación de la solicitud
        $request->validate($rules);
    
        // Crea el representante con los datos proporcionados en la solicitud
        $representante = Representante::create($request->all());
    
        // Redirecciona a la vista index de representantes con un mensaje de éxito
        return redirect()->route('representante.index')->with('success', 'Representante created successfully.');
    }
    
    /*
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function buscarRepresentante(Request $request)
    {
        $dependenciaId=Auth::user()->dependencia;     
        $cedula = $request->input('cedula');
        $representante = DB::table('representantes')
        ->select('representantes.*', 'coordinacions.nombre as nombre_coordinacion', 'parroquias.nombre as nombre_parroquia', 'centros.nombre as nombre_centro', 'dependencias.nombre as nombre_dependencia')
        ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
        ->leftJoin  ('coordinacions', 'coordinacions.id', '=', 'representantes.coordinacion_id')
        ->join('parroquias', 'parroquias.id', '=', 'representantes.parroquia_id')
        ->join('centros', 'centros.id', '=', 'representantes.centro_id')        
        ->where('representantes.cedula', $cedula)                
        ->get(); 
        if ($representante->isEmpty()) { 
            // El representante no fue encontrado
            return response()->json([
                'showModal' => 1                   
            ]);
        } else { 
            if($dependenciaId){  
                $dependenciaId=Auth::user()->dependencia->id;  
            }   
            $representantes = $representante;   
            $rutas=[];  
            $rutas = [
                'show' => route('representante.show', $representantes->first()->id),
                'edit' => route('representante.edit', $representantes->first()->id),
                'destroy' => route('representante.destroy', $representantes->first()->id)
            ];
            return response()->json([
                'showModal' => 0,
                'representantes' => $representantes,
                'dependenciaId' => $dependenciaId,
                'rutas' => $rutas
            ]);
        } 
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
        $coordinaciones = Coordinacion::pluck('nombre','id');
        $dependencias = Dependencia::pluck('nombre','id');
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
        ->with('success', 'Representante updated successfully');
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
        ->with('success', 'Representante deleted successfully');
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
}
