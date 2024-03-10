<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CoordinacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coordinacions')->insert([
            
            ['dependencia_id' => 1, 'nombre' => 'CLPP'],
            ['dependencia_id' => 1, 'nombre' => 'COORD. FERIA EVENTO Y PROTOCOLO'],
            ['dependencia_id' => 1, 'nombre' => 'SINDICATURA MUNICIPAL'],
            ['dependencia_id' => 1, 'nombre' => 'RNEI'],
            ['dependencia_id' => 1, 'nombre' => 'COORD. DE INFORMATICA Y SISTEMAS'],
            ['dependencia_id' => 1, 'nombre' => 'COORD. DE COMUNICACION E INFORMACION'],
            ['dependencia_id' => 1, 'nombre' => 'PROMOCION CAPTACION E INVERSION'],
            ['dependencia_id' => 1, 'nombre' => 'OME'],
            ['dependencia_id' => 1, 'nombre' => 'REGISTRO CIVIL'],
            ['dependencia_id' => 2, 'nombre' => 'SEGURIDAD CIUDADANA'],
            ['dependencia_id' => 2, 'nombre' => 'PREVENCION DEL DELITO'],
            ['dependencia_id' => 2, 'nombre' => 'OMA'],
            ['dependencia_id' => 2, 'nombre' => 'OAC'],
            ['dependencia_id' => 2, 'nombre' => 'GLBTIQ+'],
            ['dependencia_id' => 3, 'nombre' => 'COORD. SERVICIOS GENERALES'],
            ['dependencia_id' => 3, 'nombre' => 'TESORERIA MUNICIPAL'],
            ['dependencia_id' => 3, 'nombre' => 'COMPRAS Y SERVICIOS'],
            ['dependencia_id' => 3, 'nombre' => 'BIENES Y MATERIAS'],
            ['dependencia_id' => 4, 'nombre' => 'COORD. EVALUACION Y SEGUIMIENTO'],
            ['dependencia_id' => 4, 'nombre' => 'COORD. DE EVALUACIÓN Y PRESUPUESTO (POA)'],
            ['dependencia_id' => 4, 'nombre' => 'PLANIFICACION Y FUNCIONAMIENTO DEL PRESUPUESTO'],
            ['dependencia_id' => 4, 'nombre' => 'COORD. DE CONTABILIDAD'],
            ['dependencia_id' => 4, 'nombre' => 'COORD DE EJECUCIÓN PRESUPUESTARIA'],
            ['dependencia_id' => 5, 'nombre' => 'COORD. DE BIENESTAR SOCIAL'],
            ['dependencia_id' => 5, 'nombre' => 'COORD. DE ARCHIVO'],
            ['dependencia_id' => 5, 'nombre' => 'COORD DE NOMINA'],
            ['dependencia_id' => 5, 'nombre' => 'COORD DE RELACIONES LABORALES'],
            ['dependencia_id' => 6, 'nombre' => 'COORD. DE DESARROLLO PROTAGONICO Y PARTICIPATIVO'],
            ['dependencia_id' => 6, 'nombre' => 'COORD. DE TIERRA'],
            ['dependencia_id' => 6, 'nombre' => 'COORD. DE AGRICULTURA URBANA'],
            ['dependencia_id' => 6, 'nombre' => 'COORD. DE JUSTICIA Y PAZ'],
            ['dependencia_id' => 6, 'nombre' => 'COORD. DE MISIONES Y GRANDES MISIONES'],
            ['dependencia_id' => 6, 'nombre' => 'COORD. DE DESARROLLO ENDOGENO'],
            ['dependencia_id' => 6, 'nombre' => 'COORD. DE SALA DE PROYECTO'],

        ]
                     

    );
    }
}
