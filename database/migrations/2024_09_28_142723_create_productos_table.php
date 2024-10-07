<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // Identificador único del producto
            $table->string('nombre', 100)->unique(); // Nombre del producto (debe ser único)
            $table->text('descripcion'); // Descripción del producto
            $table->integer('cantidad'); // Cantidad disponible
            $table->decimal('precio', 10, 2); // Precio unitario del producto
            $table->string('imagen')->nullable(); // Campo para la imagen del producto
            $table->unsignedBigInteger('usuario_id')->nullable(); // Relación con usuarios, nullable
            $table->unsignedBigInteger('categoria_id')->nullable(); // Relación con categorías
            $table->timestamps(); // Timestamps de creación y actualización

            // Clave foránea para referenciar al usuario (usando la tabla users)
            //$table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
            // Clave foránea para referenciar a la categoría
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');

        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
