<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestamo::Create([
            'fechahora' => "2024-08-30",
            'estadoentrega' => "1",
            'descripcion' => "",
            'descargo' => "decargo.1pdf",
            'fotoentrega' => "foto.pdf",
            'fechadevolucion' => "2024-08-31",
            'fotodevolucion' => "foto.pdf",
            'estadodevolucion' => "2",
        ]);

    }
}
