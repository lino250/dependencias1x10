<?php

namespace App\Http\Controllers;
use App\Models\Centro;
use App\Models\Parroquia;
use App\Models\Integrante;
use App\Models\Representante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

/**
 * Class IntegranteController
 * @package App\Http\Controllers
 */
class IntegranteController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $integrantes = Integrante::paginate();
        return view('integrante.index', compact('integrantes'))
        ->with('i', (request()->input('page', 1) - 1) * $integrantes->perPage());
    }

    /*
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
<<<<<<< HEAD
        //dd($id);// ide representante
        $representante = Representante::find($id);
        
        $cedula_rep=$representante->cedula;
       
        $integrante = new Integrante();        
        $centros = Centro::pluck('nombre','id');
        $parroquias = Parroquia::pluck('nombre','id');
        return view('integrante.create', compact('integrante','id','parroquias','centros','cedula_rep'))->with('modoEdicion',false);
       //return view('integrante.show', compact('id'));
=======
        $integrante = new Integrante();
        $centros = Centro::pluck('nombre','id');
        $parroquias = Parroquia::pluck('nombre','id');
        return view('integrante.create', compact('integrante','id','parroquias','centros'));
>>>>>>> 5af83d1e135c16e2e44231a268718b20ffdd04a6
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id )
    {
        request()->validate(Integrante::$rules);
        // Paso 1: Crea el integrante y guárdalo
        $integrante = Integrante::create($request->all());
        // Paso 2: Recupera el representante
        $representante = Representante::find($id);
        // Paso 3: Asocia el integrante al representante
        $representante->integrantesR()->attach($integrante->id);
        // Paso 4: Recupera los integrantes del representante
        $integrantes = $representante->integrantesR;
        // Paso 5: Redirige a la vista con los datos necesarios        
        return view('representante.show', compact('representante', 'integrantes', 'id'));
    }

    /*
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $integrante = Integrante::find($id);
        $centros = Centro::pluck('nombre','id');
        $parroquias = Parroquia::pluck('nombre','id');
        return view('integrante.show', compact('integrante','id','parroquias','centros'));
    }

    /*
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
<<<<<<< HEAD
      //  dd($id);//id integrante
      
        $integrante = Integrante::find($id);
        $centros = Centro::pluck('nombre','id');
        $parroquias = Parroquia::pluck('nombre','id');

        /*$representante = Representante::find($id);
        $cedula_rep=$representante->cedula;*/
        return view('integrante.edit', compact('integrante','id','parroquias','centros'))->with('modoEdicion',true);
=======
        $integrante = Integrante::find($id);
        $centros = Centro::pluck('nombre','id');
        $parroquias = Parroquia::pluck('nombre','id');
        return view('integrante.edit', compact('integrante','id','parroquias','centros'));
>>>>>>> 5af83d1e135c16e2e44231a268718b20ffdd04a6
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Integrante $integrante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Integrante::$rules);
        $integrante = Integrante::find($id);
        $integrante->update($request->all());
<<<<<<< HEAD
        
      //  dd ($representante);
        // Paso 3: Asocia el integrante al representante
       // $representante->integrantesR()->attach($integrante->id);

        return redirect()->route('representante.show','id')
            ->with('success', 'Integrante updated successfully');
           // return redirect()->route('integrante.index','id');*/
           request()->validate(Integrante::$rules);
           $integrante = Integrante::find($id);
           $integrante->update($request->all());

           // Paso 2: Recupera el representante
           $representante = FacadesDB::table('representante_integrante')
           ->where('integrante_id', $id)
           ->first();

            $id_rep=($representante->representante_id);
         $representante = Representante::find($id_rep);
          $id=$id_rep;
        // Paso 3: Asocia el integrante al representante
       // $representante->integrantesR()->attach($id_rep);

          // Paso 4: Recupera los integrantes del representante
=======
        // Paso 2: Recupera el representante
        $representante = FacadesDB::table('representante_integrante')
        ->where('integrante_id', $id)
        ->first();
        $id_rep=($representante->representante_id);
        $representante = Representante::find($id_rep);
        // Paso 4: Recupera los integrantes del representante
>>>>>>> 5af83d1e135c16e2e44231a268718b20ffdd04a6
        $integrantes = $representante->integrantesR;
        // Paso 5: Redirige a la vista con los datos necesarios
        return view('representante.show', compact('representante', 'integrantes', 'id'));
    }

<<<<<<< HEAD
    public function buscarIntegrante(Request $request)
    {
     // dd($request);
      $cedula = $request->input('cedula');
     
      $integrante = Integrante::where('cedula', $cedula)->first();
      //dd($integrante);
      if ($integrante) {
          $data = [
              'encontrado' => '1',
              'mensaje' => 'Esta cédula ya esta registada en un 1x10',
              'cedula' => $integrante->cedula,
             // 'id'=>$id,
              // Agrega más campos según sea necesario
          ];          
      } else {
        $data = [
          'encontrado' => '0',
          'mensaje' => '',
          // Agrega más campos según sea necesario
      ]; 
      }
      return response()->json($data);
    }
  

    /**
=======
    /*
>>>>>>> 5af83d1e135c16e2e44231a268718b20ffdd04a6
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
      $representante = FacadesDB::table('representante_integrante')
      ->where('integrante_id', $id)
      ->first();
        $id_rep=($representante->representante_id);
        $representante = Representante::find($id_rep); 
        $integrante = Integrante::find($id);
        $id= $id_rep;
<<<<<<< HEAD

       

            // Verificar si el integrante existe
              if ($integrante) {
                // Eliminar la relación de la tabla pivote representante_integrante
                $integrante->representantes()->detach();

                // Eliminar el integrante de la tabla integrantes
                $integrante->delete();
                //dd($id);
                $integrantes = $representante->integrantesR;
                $data = [
                  'eliminado' => '1',
               ];      
                /*return redirect()->route('representante.show')->with([
                  'success' => 'Integrante deleted successfully',
                  'representante' => $representante,
                  'integrantes' => $integrantes,
                  'id' => $id,
                ]);*/
              
                  //hoyreturn view('representante.show', compact('representante', 'integrantes', 'id'));
              
              } 
              else{
                $data = [
                  'eliminado' => '0',
                ];     
              }

            return response()->json($data);
            
        //return view('representante.show', compact('representante', 'integrantes', 'id'));

        //return view('representante.show', compact('representante'))->with('success', 'Integrante deleted successfully');   

       // return redirect()->route('integrante.index')->with('success', 'Integrante deleted successfully');
   
    
=======
        // Eliminar la relación de la tabla pivote representante_integrante
        $integrante->representantes()->detach();
        // Eliminar el integrante de la tabla integrantes
        $integrante->delete();
        // Se debe redireccionar a la ruta que se quiere que se muestre seguidamente de la funcion
        return redirect()->route('representante.show', ['id' => $id_rep])->with([
        'success' => 'Integrante eliminado exitosamente',
      ]);  
>>>>>>> 5af83d1e135c16e2e44231a268718b20ffdd04a6
    }
}