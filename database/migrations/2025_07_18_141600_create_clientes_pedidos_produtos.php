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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');

        });

        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('pedido_id');
            $table->timestamps();

            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('pedido_id')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_produtos', function(Blueprint $table){
            $table->dropForeign('pedidos_produtos_pedido_id_foreign');
            $table->dropForeign('pedidos_produtos_produto_id_foreign');
        });

        Schema::table('pedidos', function(Blueprint $table){
            $table->dropForeign('pedidos_cliente_id_foreign');
        });

        Schema::dropIfExists('pedidos_produtos');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('clientes');
    }
};
