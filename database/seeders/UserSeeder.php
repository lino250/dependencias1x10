<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar datos en la tabla de usuarios
        //DB::table('users')->insert($users);
        
        DB::table('users')->insert([
            
                [
                    'name' => 'despacho',
                    'email' => 'despacho@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'direccion_general',
                    'email' => 'direccion_general@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'administracion',
                    'email' => 'administracion@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'presupuesto',
                    'email' => 'presupuesto@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'talento_humano',
                    'email' => 'talento_humano@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'comunas',
                    'email' => 'comunas@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'inmujer',
                    'email' => 'inmujer@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'samter',
                    'email' => 'samter@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'serviamsa',
                    'email' => 'serviamsa@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'policia_municipal',
                    'email' => 'policia_municipal@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'fundacultura',
                    'email' => 'fundacultura@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'fundacion_servicios_funerarios',
                    'email' => 'fundacion_servicios_funerarios@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'proteccion_civil',
                    'email' => 'proteccion_civil@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'cmdnna',
                    'email' => 'cmdnna@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'serviamersu',
                    'email' => 'serviamersu@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'parque_cementerio',
                    'email' => 'parque_cementerio@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'imatur',
                    'email' => 'imatur@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'fomet',
                    'email' => 'fomet@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'samat',
                    'email' => 'samat@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'contraloria_municipal',
                    'email' => 'contraloria_municipal@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'imasocial',
                    'email' => 'imasocial@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'camara_municipal',
                    'email' => 'camara_municipal@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'rio_manzanares',
                    'email' => 'rio_manzanares@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'fundasucre',
                    'email' => 'fundasucre@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'imdeporte',
                    'email' => 'imdeporte@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'saminfra',
                    'email' => 'saminfra@gmail.com',
                    'password' => Hash::make('dependencia1x10'),
                ],
                [
                    'name' => 'administrador', 
                    'email' => 'rafaelmudarra@gmail.com',
                    'password' => Hash::make('administrador1x10'),
                ],
                [
                    'name' => 'superadmin',
                    'email' => 'superadmin@gmail.com',
                    'password' => Hash::make('superadmin1x10'),
                ],

            ]
                         
    
        );
    }
}
