<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->id();
            $table->string('n_parte',60);
            $table->string('descripcion',500);
            $table->date('f_inicio');
            $table->string('trabajos_realizados',500);
            $table->string('observaciones',500);
            $table->string('mano_de_obra',60);
            $table->string('firma_cliente',60)->nullable();
            $table->string('firma_profesional',60);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partes');
    }
}
