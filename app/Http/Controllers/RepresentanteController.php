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

/**
 * Class RepresentanteController
 * @package App\Http\Controllers
 */
class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        $representantes = Representante::paginate(10);
        //dd($representantes);

        //$dependencias = Dependencia::pluck('nombre','id');
        
        return view('representante.index', compact('representantes'))
            ->with('i', (request()->input('page', 1) - 1) * $representantes->perPage());
            
    }*/
    public function index(Request $request)
    {

       

       $dependenciaId=Auth::user()->dependencia;
        if ($dependenciaId) {
            $representantes = Representante::where('dependencia_id', $dependenciaId->id)->paginate(10);
            
        }else{
            $representantes = Representante::paginate(10);

        }
        //$centros=$this->obtenerCentros(1);
       // dd($centros);

         /*=================================PROBAR RESULTADOS ==============================================

        $cedula='18212595';        
       $representantes = DB::table('representantes')
            ->select('representantes.*', 'coordinacions.nombre as nombre_coordinacion', 'parroquias.nombre as nombre_parroquia', 'centros.nombre as nombre_centro', 'dependencias.nombre as nombre_dependencia')
            ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
            ->join('coordinacions', 'coordinacions.id', '=', 'representantes.coordinacion_id')
            ->join('parroquias', 'parroquias.id', '=', 'representantes.parroquia_id')
            ->join('centros', 'centros.id', '=', 'representantes.centro_id')        
            ->where('representantes.cedula', $cedula)                
            ->get();  
        dd ($representantes);


=====================================================================================================*/


        return view('representante.index', compact('representantes'))
            ->with('i', (request()->input('page', 1) - 1) * $representantes->perPage());
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($parroquias);

        $representante = new Representante();
        $parroquias = Parroquia::pluck('nombre','id');       
        $centros = Centro::pluck('nombre','id');
        $coordinaciones = Coordinacion::pluck('nombre','id');
        $dependencias = Dependencia::pluck('nombre','id');
        return view('representante.create', compact('representante','parroquias','centros','coordinaciones','dependencias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Representante::$rules);

        $representante = Representante::create($request->all());

        return redirect()->route('representante.index')
            ->with('success', 'Representante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function buscarRepresentante1(Request $request)
    {
       // $representantes = Representante::paginate(10);
       $representante = Representante::paginate(10);

       
       $cedula = $request->input('cedula');
       if (!empty($cedula)) {


        $representante = Representante::where('cedula', $cedula)->paginate(10);
        //dd($representante);       
       }    
       
        if ($representante !== null) { 

            $representantes = $representante;
            // Redirigir a la vista 'index' solo con la persona encontrada
            return view('representante.index', compact('representantes', 'cedula'))->with('mensaje', 'Cédula encontrada.');
           // return $this->index();
        }
        
        if ($representante == null) { 

                    $representantes = $representante;
                    // Redirigir a la vista 'index' solo con la persona encontrada
                    return view('representante.index', compact('representantes', 'cedula'))->with('mensaje', 'No hay registros...');
        }
        //return $this->index();
       
        
    }*/
    public function buscarRepresentante(Request $request)
    {

        
            $dependenciaId=Auth::user()->dependencia;     
            $cedula = $request->input('cedula');
           
    
            $representante = DB::table('representantes')
            ->select('representantes.*', 'coordinacions.nombre as nombre_coordinacion', 'parroquias.nombre as nombre_parroquia', 'centros.nombre as nombre_centro', 'dependencias.nombre as nombre_dependencia')
            ->join('dependencias', 'dependencias.id', '=', 'representantes.dependencia_id')
            ->join('coordinacions', 'coordinacions.id', '=', 'representantes.coordinacion_id')
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
                //$representantes2 = $representante; 
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
          
            /*else {
                if ($dependenciaId) {
                    $representantes = Representante::where('dependencia_id', $dependenciaId->id)->paginate(10);
                    
                }else{
                    $representantes = Representante::paginate(10);
        
                } 
                return response()->json([
                    'showModal' => 1,
                    'representantes' => $representantes,
                    'dependenciaId' => $dependenciaId
                ]);
            }*/
        
        // Si la cédula está vacía, se devuelve un mensaje de error
        
    }
  
    /*public function buscarRepresentante(Request $request)
    {
        $dependenciaId=Auth::user()->dependencia;    
       $cedula = $request->input('cedula');
       if (!empty($cedula)) {


        //$representante = Representante::where('cedula', $cedula)->first();    
        $representante = Representante::where(function ($query) use ($dependenciaId, $cedula) {
            $query->where('dependencia_id', $dependenciaId->id) // Representantes de la dependencia del usuario
                ->orWhere(function ($query) use ($cedula) {
                    $query->whereNull('dependencia_id') // Representantes sin dependencia asociada
                        ->where('cedula', $cedula); // Cédula proporcionada
                });
        })
        ->paginate(10);   
       }    
       
        if ($representante) { 

            return response()->json(['showModal' =>  0]);
        } 
        else {

           // $representantes = $representante;
            // Redirigir a la vista 'index' solo con la persona encontrada
            return response()->json(['showModal' => 1]);

        }     
       
        
    }
   */
   
    public function show($id)
    {
        $representante = Representante::find($id);
       
        $parroquias = $representante->parroquia;
        $centros = $representante->centro;
     
        $this->buscarIntegrante($id);

        $dependencia= $representante->dependencia;
        $coordinacion= $representante->coordinacion;
       // dd ($dependencia);
        //dd ($parroquias);

        //return view('representante.show', compact('representante'))->with('id',$id);
        return view('representante.show', compact('representante','parroquias','centros','coordinacion','dependencia'))->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        //dd($id);
        $representante = Representante::find($id);
        $parroquias = Parroquia::pluck('nombre','id');
        $centros = Centro::pluck('nombre','id');
        $coordinaciones = Coordinacion::pluck('nombre','id');
        $dependencias = Dependencia::pluck('nombre','id');
        return view('representante.edit', compact('representante','centros','coordinaciones','dependencias', 'parroquias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Representante $representante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representante $representante)
    {
        //dd($request);
        //dd($representante);
        //request()->validate(Representante::$rules);
    
        $representante->update($request->all());
       // dd ($representante);
        return redirect()->route('representante.index')
            ->with('success', 'Representante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $representante = Representante::find($id)->delete();
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
