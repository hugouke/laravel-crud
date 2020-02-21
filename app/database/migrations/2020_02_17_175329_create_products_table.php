<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
 
            $table->integer('category_id')->unsigned();// Id da tabela categories
            $table->foreign('category_id')->references('id')->on('categories'); // Define o campo como chave extrangeira (foreign key)
        
            $table->string('name', 100)->unique(); // Nome do Produto
            $table->string('image', 100)->nullable(); // Imagem do Produto
            $table->text('description')->nullable(); // Descrição do produto
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
        Schema::dropIfExists('products');
    }
}
