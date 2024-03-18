<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Coordinacion;
use App\Models\Dependencia;
use App\Models\Parroquia;
use App\Models\Representante;
use App\Models\Integrante;
use Illuminate\Http\Request;
use DB;

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
        $representantes = Representante::paginate(10);

        //$dependencias = Dependencia::pluck('nombre','id');

        $cedula = $request->input('cedula');
        if (!empty($cedula)) {
 
 
         $representante = Representante::where('cedula', $cedula)->paginate(10);
            if ($representante !== null) { 

            $representantes = $representante;
            // Redirigir a la vista 'index' solo con la persona encontrada
           // return view('representante.index', compact('representantes', 'cedula'))->with('mensaje', 'Cédula encontrada.');
           
            } 
            
        } 
        
       
        
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
              
       $cedula = $request->input('cedula');
       if (!empty($cedula)) {


        $representante = Representante::where('cedula', $cedula)->first();       
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
   
   
    public function show($id)
    {
        $representante = Representante::find($id);
        $parroquias = Parroquia::pluck('nombre','id');       
        $centros = Centro::pluck('nombre','id');
        //$integrantes = Representante::all();
        
        $this->buscarIntegrante($id);

        //return view('representante.show', compact('representante'))->with('id',$id);
        return view('representante.show', compact('representante','parroquias','centros'))->with('id',$id);
    }

    /**
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Representante $representante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Representante $representante)
    {
        request()->validate(Representante::$rules);

        $representante->update($request->all());

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
           // $integrantes = $representante->integrantes;//ASI ESTABA INICIALMENTE
          //  $integrantes = $representante->integrantes->parroquia();
            //$integrantes = Integrante::with('parroquia')->get();
            $integrantes = $representante->integrantesR()->with('parroquia')->get();
            return $integrantes;
        }
        
    }
   
}
