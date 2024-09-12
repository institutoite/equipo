<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grado;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //   GENERALES
         Grado::create(["grado"=>"Gral. Sup."]);
         Grado::create(["grado"=>"Gral. My."]);
         Grado::create(["grado"=>"Gral. 1ro."]);
         // JEFES:
         Grado::create(["grado"=>"Cnl."]);
         Grado::create(["grado"=>"My."]);
         // OFICIALES:
         Grado::create(["grado"=>"Cap."]);
         Grado::create(["grado"=>"Tte."]);
         Grado::create(["grado"=>"Sbtte."]);
         // SUBOFICIALES:
         Grado::create(["grado"=>"Sof. Sup."]);
         Grado::create(["grado"=>"Sof. My."]);
         Grado::create(["grado"=>"Tcnl."]);
         Grado::create(["grado"=>"Sof. 1ro."]);
         Grado::create(["grado"=>"Sof. 2do."]);
         // SARGENTOS:
         Grado::create(["grado"=>"Sgto. My."]);
         Grado::create(["grado"=>"Sgto. 1ro."]);
         Grado::create(["grado"=>"Sgto. 2do."]);
         Grado::create(["grado"=>"Sgto."]);
         // JEFES DE SERVICIO:
         Grado::create(["grado"=>"Cnl. Serv."]);
         Grado::create(["grado"=>"Tcnl. Serv."]);
         Grado::create(["grado"=>"My. Serv."]);
         //  OFICIALES:
         Grado::create(["grado"=>"Cap. Serv."]);
         Grado::create(["grado"=>"Tte. Serv."]);
         Grado::create(["grado"=>"Sbtte. Serv."]);
         // SUBOFICIALES:
         Grado::create(["grado"=>"Sof. Sup. Serv."]);
         Grado::create(["grado"=>"Sof. My. Serv."]);
         Grado::create(["grado"=>"Sof. 1ro. Serv."]);
         Grado::create(["grado"=>"Sof. 2do. Serv."]);
         // SARGENTOS:
         Grado::create(["grado"=>"Sgto. My. Serv."]);
         Grado::create(["grado"=>"Sgto. 1ro. Serv."]);
         Grado::create(["grado"=>"Sgto. 2do. Serv."]);
         Grado::create(["grado"=>"Sgto. Serv."]);


    }
}

        /*Grado::create(["grado"=>"Sgto. My. Serv.","estado"=>1]);
         Grado::create(["grado"=>"Sgto. 1ro. Serv.","estado"=>1]);
         Grado::create(["grado"=>"Sgto. 2do. Serv.","estado"=>1]);
         Grado::create(["grado"=>"Sgto. Serv.","estado"=>1]);*/
    /*
         Grado::create([
            'grado' => "Gral. Superior",
        ]);
        Grado::create([
            'grado' => "Gral. Primero",
        ]);
        Grado::create([
            'grado' => "Gral. Mayor",
        ]);
        Grado::create([
            'grado' => "Cnl",
        ]);
        Grado::create([
            'grado'=> "Tte. Coronel",
        ]);
        Grado::create([
            'grado'=> "My",
        ]);
        Grado::create([
            'Grado' => "Tte.",
        ]);*/
