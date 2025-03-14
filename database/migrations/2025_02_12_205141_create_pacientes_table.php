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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificacion')->unique();
            $table->string('correo')->unique();
            $table->string('entidad');
            $table->string('fecha_de_nacimiento');
            $table->string('genero');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('tipo_de_sangre');
            $table->string('alergias')->nullable();
            $table->string('contacto_emergencia');
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
