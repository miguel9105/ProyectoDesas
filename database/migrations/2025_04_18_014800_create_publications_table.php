<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up(): void
    {
        // crea la tabla publications en la base de datos
        Schema::create('publications', function (Blueprint $table) {
        // crea una columna para cada atributo de la tabla
        $table->id();
        $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
        $table->string('title');
        $table->string('type');
        $table->string('severity');
        $table->string('location');
        $table->text('description');
        $table->string('image')->nullable();
        $table->timestamps();
    });
    }

    public function down(): void
    {
        // elimina la tabla publications si existe
        Schema::dropIfExists('publications');
    }

};
