<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos_compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produto');
            $table->unsignedBigInteger('id_compra');
            $table->integer('quantidade');
            $table->float('valor_unitario');
            $table->timestamps();

            $table->foreign('id_produto')->references('id')->on('produtos');
            $table->foreign('id_compra')->references('id')->on('compra');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_compra');
    }
};
