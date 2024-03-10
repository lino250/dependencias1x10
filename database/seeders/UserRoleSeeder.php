<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = ['superadmin', 'administrador', 'dependencia'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }
        $usersAndRoles = [
            ['name' => 'superadmin', 'roles' => ['superadmin']],
            ['name' => 'administrador', 'roles' => ['administrador']],
            ['name' => 'despacho', 'roles' => ['dependencia']],
            ['name' => 'direccion_general', 'roles' => ['dependencia']],
            ['name' => 'administracion', 'roles' => ['dependencia']],
            ['name' => 'presupuesto', 'roles' => ['dependencia']],
            ['name' => 'talento_humano', 'roles' => ['dependencia']],
            ['name' => 'comunas', 'roles' => ['dependencia']],
            ['name' => 'inmujer', 'roles' => ['dependencia']],
            ['name' => 'samter', 'roles' => ['dependencia']],
            ['name' => 'serviamsa', 'roles' => ['dependencia']],
            ['name' => 'policia_municipal', 'roles' => ['dependencia']],
            ['name' => 'fundacultura', 'roles' => ['dependencia']],
            ['name' => 'fundacion_servicios_funerarios', 'roles' => ['dependencia']],
            ['name' => 'proteccion_civil', 'roles' => ['dependencia']],
            ['name' => 'cmdnna', 'roles' => ['dependencia']],
            ['name' => 'serviamersu', 'roles' => ['dependencia']],
            ['name' => 'parque_cementerio', 'roles' => ['dependencia']],
            ['name' => 'imatur', 'roles' => ['dependencia']],
            ['name' => 'fomet', 'roles' => ['dependencia']],
            ['name' => 'samat', 'roles' => ['dependencia']],
            ['name' => 'contraloria_municipal', 'roles' => ['dependencia']],
            ['name' => 'imasocial', 'roles' => ['dependencia']],
            ['name' => 'camara_municipal', 'roles' => ['dependencia']],
            ['name' => 'rio_manzanares', 'roles' => ['dependencia']],
            ['name' => 'fundasucre', 'roles' => ['dependencia']],
            ['name' => 'imdeporte', 'roles' => ['dependencia']],
            ['name' => 'saminfra', 'roles' => ['dependencia']],
        ];

        foreach ($usersAndRoles as $data) {
            $user = User::where('name', $data['name'])->first();

            if ($user) {
                $roles = Role::whereIn('name', $data['roles'])->get();
                $user->roles()->sync($roles->pluck('id')->toArray());
            }
        }

    }
}
