<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Eliminar la clave foránea existente
            $table->dropForeign(['id_categoria']);

            // Volver a agregar la clave foránea con la eliminación en cascada
            $table->foreign('id_categoria')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            // Eliminar la clave foránea existente con eliminación en cascada
            $table->dropForeign(['id_categoria']);

            // Revertir la eliminación en cascada (si es necesario)
            $table->foreign('id_categoria')
                  ->references('id')
                  ->on('categorias');
        });
    }
};
