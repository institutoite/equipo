<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidad;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Especialidad::create(["especialidad" => "DEAP.", "estado" => 1]);
        Especialidad::create(["especialidad" => "DESP.", "estado" => 1]);
        Especialidad::create(["especialidad" => "DAP.", "estado" => 1]);
        Especialidad::create(["especialidad" => "DGP.", "estado" => 1]);
        Especialidad::create(["especialidad" => "MUS.", "estado" => 1]);
    }
}
