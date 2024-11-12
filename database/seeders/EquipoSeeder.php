<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipos')->insert([
            [
                'nombre' => 'Alta velocidad',
                'descripcion' => 'Equipo de red de alta velocidad',
                'codigo' => 'EQ'.Str::Random (10),
                'qr' => Str::Random (10),
                'foto' => 'foto.jpg',
                'estado_id' => 3,
                'personal_id' => 1,
                'fechadealta' => now()->toDateString(),
                'cantidad_total'=>12,
                'cantidad_disponible'=>15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre'=> 'nube',
                'descripcion' => 'servidor de almacenamiento en la nube',
                'codigo' => 'EQ'.Str::Random (10),
                'qr' => Str::Random (10),
                'foto' => 'foto.jpg',
                'estado_id' => 1,
                'personal_id' =>2,
                'fechadealta' => now()->toDateString(),
                'cantidad_total'=>12,
                'cantidad_disponible'=>15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre'=>'lanza gas',
                'descripcion' => 'rifle lanza gas',
                'codigo' => 'EQ'.Str::Random (10),
                'qr' => Str::Random (10),
                'foto' => 'foto.jpg',
                'estado_id' => 1,
                'personal_id' => 2,
                'fechadealta' => now()->toDateString(),
                'cantidad_total'=>12,
                'cantidad_disponible'=>15,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
