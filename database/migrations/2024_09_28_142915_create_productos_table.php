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
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Identificador único del producto
            $table->string('nombre', 100)->unique(); // Nombre del producto (debe ser único)
            $table->text('descripcion'); // Descripción del producto
            $table->integer('cantidad'); // Cantidad disponible
            $table->decimal('precio', 10, 2); // Precio unitario del producto
            $table->unsignedBigInteger('usuario_id'); // Relación con usuarios
            $table->unsignedBigInteger('categoria_id')->nullable(); // Relación con categorías
            $table->timestamps(); // Timestamps de creación y actualización

            // Clave foránea para referenciar al usuario
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
            // Clave foránea para referenciar a la categoría
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
