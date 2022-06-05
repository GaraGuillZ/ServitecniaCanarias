<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',60)->nullable();
            $table->string('apellidos',150)->nullable();
            $table->string('nom_empresa', 150)->nullable();
            $table->date('f_nacimiento')->nullable();
            $table->string('dni',9)->nullable();
            $table->string('cif',9)->nullable();
            $table->string('email',50);
            $table->string('telefono', 15);
            $table->string('movil', 15);
            $table->string('direccion',300);
            $table->string('per_contacto', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
