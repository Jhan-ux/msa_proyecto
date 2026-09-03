<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'admin@msaautomotriz.com'],
            [
                'name' => 'Admin MSA',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            \Database\Seeders\MarcaModeloSeeder::class,
            \Database\Seeders\ServiciosLocalesSeeder::class,
            \Database\Seeders\TransporteRentingSeeder::class,
            \Database\Seeders\SeminuevosSeeder::class,
        ]);
    }
}
