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
        Schema::create('produto_detalhes', function (Blueprint $table) {
            //colunas
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->float('comprimento', 8,2);
            $table->float('altura', 8,2);
            $table->float('largura', 8,2);
            $table->timestamps();

            //contraint de relacionamento que garante que o valor da tabela produtos é o mesmo que o valor do campo produto_id
            $table->foreign('produto_id')->references('id')->on('produtos');
            //garante que o relacionamento seja de 1:1 evitanto que um produto tenha varios detalhes
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
};
