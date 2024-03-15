<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
/*use App\Seeders\UserSeeder;
use App\Seeders\UserRoleSeeder;
use App\Seeders\DependenciaSeeder;
use App\Seeders\CoordinacionesSeeder;
use App\Seeders\ParroquiasSeeder;
use App\Seeders\CentrosDeVotacionSeeder;*/
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            UserRoleSeeder::class,
            DependenciaSeeder::class,
            CoordinacionesSeeder::class,
            ParroquiasSeeder::class,
            CentrosDeVotacionSeeder::class,
        ]);
       /* $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(DependenciaSeeder::class);
        $this->call(CoordinacionesSeeder::class);
        $this->call(ParroquiasSeeder::class);
        $this->call(CentrosDeVotacionSeeder::class);*/

    }
}
