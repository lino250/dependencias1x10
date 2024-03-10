<?php

namespace App\Http\Controllers;

use App\Models\Parroquia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParroquiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $parroquias = Parroquia::all();
        return view('parroquias.index', compact('parroquias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //return view('parroquias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*$request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Parroquia::create($request->all());

        return redirect()->route('parroquias.index')->with('success', 'Parroquia creada exitosamente');*/
    }

    /**
     * Display the specified resource.
     */
    public function show(Parroquia $parroquia)
    {
        //
        //return view('parroquias.show', compact('parroquia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parroquia $parroquia)
    {
        //
        //return view('parroquias.edit', compact('parroquia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parroquia $parroquia)
    {
        //
        /*$request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        /*$parroquia->update($request->all());

        return redirect()->route('parroquias.index')->with('success', 'Parroquia actualizada exitosamente');*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parroquia $parroquia)
    {
        //
        /*$parroquia->delete();
        return redirect()->route('parroquias.index')->with('success', 'Parroquia eliminada exitosamente');*/
    }
}
