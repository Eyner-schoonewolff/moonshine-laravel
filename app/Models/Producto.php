<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{   
    protected string $title = 'producto';
    use HasFactory;
    
    protected $fillename = [
        "nombre",
        "precio",
        "condicion",
        "descripcion"
    ];
}
