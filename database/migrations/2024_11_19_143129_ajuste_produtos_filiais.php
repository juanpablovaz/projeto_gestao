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

        // Criando a tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial',30);
            $table->timestamps();
        });

        // Criando a tabela produto_filiais
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');

            //preco_venda, estoque minimo e maximo depende das filiais
            $table->decimal('preco_venda',8,2);  //decimal,  indica que a coluna preco_venda da tabela produtos é do tipo double
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();

            //FK's

            $table-> foreign('filial_id')->references('id')->on('filiais');
            $table-> foreign('produto_id')->references('id')->on('produtos');
        });


        //removendo Colunas da tabela produtos

        Schema::table('produtos' , function (Blueprint $table){
            $table->dropColumn([
                'preco_venda',
                'estoque_minimo',
                'estoque_maximo'
            ]);
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
        //adiciona Colunas da tabela produtos

        Schema::table('produtos' , function (Blueprint $table){
            $table->decimal('preco_venda',8,2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        }); 
        
        Schema::dropIfExists('produto_filiais');

        Schema::dropIfExists('filiais');
    }
};
