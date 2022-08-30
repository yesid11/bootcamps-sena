<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Hash;

class BootcampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //leer el archivo de datos

        $json=File::get('database/_data/bootcamps.json');

        //convertir los datos del json en un arreglo

        $arreglo_bootcamps=json_decode($json);
        //recorrer el arreglo
        
        //var_dump($arreglo_usuarios);
        foreach($arreglo_bootcamps as $bootcamp){
        //por cada elemento dekl arreglo crear
        //un <<entity>>
        Bootcamp::create([
            "name" => $bootcamp->name,
            "description" => $bootcamp->description,
            "website" =>$bootcamp->website,
            "phone" =>$bootcamp->phone,
            "user_id"=>$bootcamp->user_id
        ]);
    };
    }
    }

