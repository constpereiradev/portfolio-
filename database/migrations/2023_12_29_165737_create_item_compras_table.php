<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_compras', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('nome');
            $table->string('bandeira');
            $table->string('tipoTransacao');
            $table->string('tipoCompra');
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
        Schema::dropIfExists('item_compras');
    }
}
