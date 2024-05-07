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