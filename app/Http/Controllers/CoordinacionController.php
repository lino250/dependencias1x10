<?php

namespace App\Http\Controllers;

use App\Models\Coordinacion;
use Illuminate\Http\Request;

/**
 * Class CoordinacionController
 * @package App\Http\Controllers
 */
class CoordinacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinacions = Coordinacion::paginate();

        return view('coordinacion.index', compact('coordinacions'))
            ->with('i', (request()->input('page', 1) - 1) * $coordinacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coordinacion = new Coordinacion();
        return view('coordinacion.create', compact('coordinacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Coordinacion::$rules);

        $coordinacion = Coordinacion::create($request->all());

        return redirect()->route('coordinacions.index')
            ->with('success', 'Coordinacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coordinacion = Coordinacion::find($id);

        return view('coordinacion.show', compact('coordinacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coordinacion = Coordinacion::find($id);

        return view('coordinacion.edit', compact('coordinacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Coordinacion $coordinacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordinacion $coordinacion)
    {
        request()->validate(Coordinacion::$rules);

        $coordinacion->update($request->all());

        return redirect()->route('coordinacions.index')
            ->with('success', 'Coordinacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coordinacion = Coordinacion::find($id)->delete();

        return redirect()->route('coordinacions.index')
            ->with('success', 'Coordinacion deleted successfully');
    }
}
