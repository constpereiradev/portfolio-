<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoTransacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_transacaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->bigInteger('tipo_compra_id');
            $table->foreign('tipo_compra_id')
                ->references('id')
                ->on('tipo_compras');
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
        Schema::dropIfExists('tipo_transacaos');
    }
}
