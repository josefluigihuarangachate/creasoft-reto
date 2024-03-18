<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

use Illuminate\Contracts\Auth\Authenticatable; // Importa la interfaz Authenticatable
use Illuminate\Foundation\Auth\User as AuthenticatableUser; // Importa la clase base de Laravel

class Usuarios extends AuthenticatableUser implements Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Nombre de la tabla asociada con el modelo
    protected $table = 'usuarios';

    // Nombre de la columna que sirve como clave primaria
    protected $primaryKey = 'id_usuario';

    // Nombre de la columna que almacena la contraseña
    protected $password = 'clave';

    // Nombre de la columna que almacena el "remember token"
    protected $rememberTokenName = 'remember_token';


    protected $fillable = ['nombre', 'apellido', 'usuario', 'clave', 'estado', 'fechayhora_creado'];

    protected $hidden = [
        'clave',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'fechayhora_creado' => 'datetime'
    ];

}
