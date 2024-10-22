<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entrada extends Model
{
    //
    use HasFactory;
    protected $table="entrada";
    protected $fillable = [
        'evento_id', // Clave foránea que hace referencia a la tabla eventos
        'pago',      // Monto del pago
        'dni',       // Documento Nacional de Identidad
    ];

}
