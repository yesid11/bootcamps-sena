<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //leer el archivo de datos

        $json=File::get('database/_data/users.json');

        //convertir los datos del json en un arreglo

        $arreglo_usuarios=json_decode($json);
        //recorrer el arreglo
        
        //var_dump($arreglo_usuarios);
        foreach($arreglo_usuarios as $usuario){
        //por cada elemento dekl arreglo crear
        //un <<entity>>
        User::create([
            "name" => $usuario->name,
            "email" => $usuario->email,
            "password" =>Hash::make($usuario->password)
        ]);
    };
    }
}
