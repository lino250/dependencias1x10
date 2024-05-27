<?php

namespace App\Http\Controllers;

use App\Models\Voto;
use App\Http\Requests\VotoRequest;

/**
 * Class VotoController
 * @package App\Http\Controllers
 */
class VotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $votos = Voto::paginate();

        return view('voto.index', compact('votos'))
            ->with('i', (request()->input('page', 1) - 1) * $votos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $voto = new Voto();
        return view('voto.create', compact('voto'));
    }

    public function store(VotoRequest $request)
    {
        Voto::create($request->validated());
    
        return redirect()->route('voto.index')
            ->with('success', 'Voto created successfully.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $voto = Voto::find($id);

        return view('voto.show', compact('voto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $voto = Voto::find($id);

        return view('voto.edit', compact('voto'));
    }

    public function update(VotoRequest $request, Voto $voto)
    {
        $voto->update($request->validated());
    
        return redirect()->route('voto.index')
            ->with('success', 'Voto updated successfully');
    }

    public function destroy($id)
    {
        Voto::find($id)->delete();

        return redirect()->route('votos.index')
            ->with('success', 'Voto deleted successfully');
    }
}
