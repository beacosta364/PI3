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
        Schema::table('productos', function (Blueprint $table) {
            // Eliminar la columna 'precio'
            $table->dropColumn('precio');
            
            // Agregar la columna 'min_stock'
            $table->integer('min_stock')->nullable(); // Nuevo campo 'min_stock'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Deshacer el cambio: eliminar la columna 'min_stock' y agregar 'precio'
            $table->dropColumn('min_stock');
            $table->decimal('precio', 10, 2); // Revertir a la columna original
        });
    }
};
