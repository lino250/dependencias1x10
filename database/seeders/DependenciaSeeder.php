<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DependenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dependencias')->insert([
            
            ['nombre' => 'DESPACHO', 'tipo' => '1'],
            ['nombre' => 'DIRECCIÓN GENERAL', 'tipo' => '1'],
            ['nombre' => 'ADMINISTRACION', 'tipo' => '1'],
            ['nombre' => 'PRESUPUESTO', 'tipo' => '1'],
            ['nombre' => 'TALENTO HUMANO', 'tipo' => '1'],
            ['nombre' => 'COMUNAS', 'tipo' => '1'],
            ['nombre' => 'INMUJER', 'tipo' => '2'],
            ['nombre' => 'SAMTER', 'tipo' => '2'],
            ['nombre' => 'SERVIAMSA', 'tipo' => '2'],
            ['nombre' => 'POLICIA MUNICIPAL', 'tipo' => '2'],
            ['nombre' => 'FUNDACULTURA', 'tipo' => '2'],
            ['nombre' => 'FUNDACION SERVICIOS FUNERARIOS', 'tipo' => '2'],
            ['nombre' => 'PROTECCION CIVIL', 'tipo' => '2'],
            ['nombre' => 'CMDNNA', 'tipo' => '2'],
            ['nombre' => 'SERVIAMERSU', 'tipo' => '2'],
            ['nombre' => 'PARQUE CEMENTERIO', 'tipo' => '2'],
            ['nombre' => 'IMATUR', 'tipo' => '2'],
            ['nombre' => 'FOMET', 'tipo' => '2'],
            ['nombre' => 'SAMAT', 'tipo' => '2'],
            ['nombre' => 'CONTRALORIA MUNICIPAL', 'tipo' => '2'],
            ['nombre' => 'IMASOCIAL', 'tipo' => '2'],
            ['nombre' => 'CAMARA MUNICIPAL', 'tipo' => '2'],
            ['nombre' => 'RIO MANZANARES', 'tipo' => '2'],
            ['nombre' => 'FUNDASUCRE', 'tipo' => '2'],
            ['nombre' => 'IMDEPORTE', 'tipo' => '2'],
            ['nombre' => 'SAMINFRA', 'tipo' => '2'],

        ]
                     

    );
    }
}
