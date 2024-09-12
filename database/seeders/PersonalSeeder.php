<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Personal;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Personal::create([
           'escalafon' => "13036-CB",
           'nombres' => "JUAN",
           'apellidos'=> "CONDORI" ,
           'grado_id' => 2,

        ]);
        Personal::create([
            'escalafon' => "13085-CB",
            'nombres' => "JAVIER MHILAN",
            'apellidos'=> "ACHO ACHO" ,
            'grado_id' => 3,

         ]);
         Personal::create([
            'escalafon' => "13058-CB",
            'nombres' => "CARLOS",
            'apellidos'=> "MACHACA" ,
            'grado_id' => 1,

         ]);
         Personal::create([
            'escalafon' => "13099-CB",
            'nombres' => "DAVID",
            'apellidos'=> "MACHACA" ,
            'grado_id' => 2,

         ]);
    }
}
