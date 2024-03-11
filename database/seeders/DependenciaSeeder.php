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
            
            ['nombre' => 'DESPACHO', 'tipo' => '1', 'user_id' => '1'],
            ['nombre' => 'DIRECCIÓN GENERAL', 'tipo' => '1', 'user_id' => '2'],
            ['nombre' => 'ADMINISTRACION', 'tipo' => '1', 'user_id' => '3'],
            ['nombre' => 'PRESUPUESTO', 'tipo' => '1', 'user_id' => '4'],
            ['nombre' => 'TALENTO HUMANO', 'tipo' => '1', 'user_id' => '5'],
            ['nombre' => 'COMUNAS', 'tipo' => '1', 'user_id' => '6'],
            ['nombre' => 'INMUJER', 'tipo' => '2', 'user_id' => '7'],
            ['nombre' => 'SAMTER', 'tipo' => '2', 'user_id' => '8'],
            ['nombre' => 'SERVIAMSA', 'tipo' => '2', 'user_id' => '9'],
            ['nombre' => 'POLICIA MUNICIPAL', 'tipo' => '2', 'user_id' => '10'],
            ['nombre' => 'FUNDACULTURA', 'tipo' => '2', 'user_id' => '11'],
            ['nombre' => 'FUNDACION SERVICIOS FUNERARIOS', 'tipo' => '2', 'user_id' => '12'],
            ['nombre' => 'PROTECCION CIVIL', 'tipo' => '2', 'user_id' => '13'],
            ['nombre' => 'CMDNNA', 'tipo' => '2', 'user_id' => '14'],
            ['nombre' => 'SERVIAMERSU', 'tipo' => '2', 'user_id' => '15'],
            ['nombre' => 'PARQUE CEMENTERIO', 'tipo' => '2', 'user_id' => '16'],
            ['nombre' => 'IMATUR', 'tipo' => '2', 'user_id' => '17'],
            ['nombre' => 'FOMET', 'tipo' => '2', 'user_id' => '18'],
            ['nombre' => 'SAMAT', 'tipo' => '2', 'user_id' => '19'],
            ['nombre' => 'CONTRALORIA MUNICIPAL', 'tipo' => '2', 'user_id' => '20'],
            ['nombre' => 'IMASOCIAL', 'tipo' => '2', 'user_id' => '21'],
            ['nombre' => 'CAMARA MUNICIPAL', 'tipo' => '2', 'user_id' => '22'],
            ['nombre' => 'RIO MANZANARES', 'tipo' => '2', 'user_id' => '23'],
            ['nombre' => 'FUNDASUCRE', 'tipo' => '2', 'user_id' => '24'],
            ['nombre' => 'IMDEPORTE', 'tipo' => '2', 'user_id' => '25'],
            ['nombre' => 'SAMINFRA', 'tipo' => '2', 'user_id' => '26'],

        ]
                     

    );
    }
}
