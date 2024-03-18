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
        Schema::create('solicitar', function (Blueprint $table) {
            $table->increments('id_solicitar');
            $table->string('numero_celular');
            $table->string('dni');
            $table->dateTime('fechayhora_solicitada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitar');
    }
};
