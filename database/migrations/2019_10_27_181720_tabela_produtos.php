<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cover', 255)->nullable()->default('no_image.png');
            $table->string('nome', 255);
            $table->text('descricao', 255)->nullable();
            $table->decimal('preco', 9, 2)->default(0);
            $table->integer('estoque')->default(0);
            $table->integer('peso_gramas')->default(0);
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
        Schema::dropIfExists('produtos');
    }
}
