<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('usuario');
            $table->string('clave');
            $table->boolean('estado')->default(true);
            $table->dateTime('fechayhora_creado');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('usuarios')->insert(
            array(
                'nombre' => 'Luigi',
                'apellido' => 'Huaranga',
                'usuario' => 'admin',
                'clave' => Hash::make('admin'),
                'fechayhora_creado' => \Carbon\Carbon::parse(date('Y-m-d H:i:s')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
