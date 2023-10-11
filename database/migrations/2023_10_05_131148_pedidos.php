<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cliente');
            $table->foreignId('id_produto');
            $table->foreignId('id_forma_pagamento');
            $table->string('valor_pedido');
            $table->string('quantidade');
            $table->string('status_pedido');
            $table->string('status_pagamento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
