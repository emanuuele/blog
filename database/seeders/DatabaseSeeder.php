<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Usuario::factory(10)->create();
        \App\Models\Comentario::factory(10)->create();
        \App\Models\Artigo::factory(10)->create();
    }
}
