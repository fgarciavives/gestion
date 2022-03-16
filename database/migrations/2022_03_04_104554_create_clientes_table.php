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
            $table->id()->references('numero')
                        ->on('facturas')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->string('nif');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('poblacion');
            $table->string('provincia');
            $table->integer('cpostal');
            $table->string('email');
            $table->string('telefono');
            $table->timestamps();
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
