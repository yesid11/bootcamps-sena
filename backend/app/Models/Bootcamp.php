<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    
    use HasFactory;

    //filliable:permite realizar carga masiva de atributos/instancias de una clase al tiempo

    protected $fillable=['name',
                        'description',
                        'website',
                        'phone',
                        'user_id'];
}
