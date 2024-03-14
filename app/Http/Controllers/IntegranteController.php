<?php

namespace App\Http\Controllers;

use App\Models\Integrante;
use App\Models\Representante;
use Illuminate\Http\Request;

/**
 * Class IntegranteController
 * @package App\Http\Controllers
 */
class IntegranteController extends Controller
{
    /**
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        //dd($id);
        $integrante = new Integrante();
        return view('integrante.create', compact('integrante','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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

        /*return redirect()->route('representante.show')//lino
            ->with('success', 'Integrante created successfully.');*/
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $integrante = Integrante::find($id);

        return view('integrante.show', compact('integrante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $integrante = Integrante::find($id);

        return view('integrante.edit', compact('integrante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Integrante $integrante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Integrante $integrante)
    {
        request()->validate(Integrante::$rules);

        $integrante->update($request->all());

        return redirect()->route('integrante.index')
            ->with('success', 'Integrante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $integrante = Integrante::find($id)->delete();

        return redirect()->route('integrante.index')
            ->with('success', 'Integrante deleted successfully');
    }
}
