<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ParroquiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('parroquias')->insert([
            ['nombre' => 'ALTAGRACIA'],
            ['nombre' => 'AYACUCHO'],
            ['nombre' => 'GRAN MARISCAL'],
            ['nombre' => 'RAUL LEONI'],
            ['nombre' => 'SAN JUAN'],
            ['nombre' => 'SANTA INES'],
            ['nombre' => 'VALENTIN VALIENTE']
        ]);
    }
}

