<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitar extends Model
{
    
    protected $table = 'solicitar';
    protected $fillable = ['numero_celular', 'dni', 'fechayhora_solicitada'];
}
