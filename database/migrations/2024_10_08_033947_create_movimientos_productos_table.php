<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(){
            Schema::create('movimientos_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id'); // Relación con productos
            $table->unsignedBigInteger('usuario_id')->nullable(); // Relación con usuarios
            $table->integer('cantidad'); // Cantidad movida
            $table->enum('tipo_movimiento', ['ingreso', 'salida']); // Tipo de movimiento
            $table->text('descripcion')->nullable(); // Descripción opcional del movimiento
            $table->timestamps();

            // Claves foráneas
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
        });
    }

};
