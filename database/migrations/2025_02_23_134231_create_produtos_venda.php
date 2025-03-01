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
        Schema::create('produtos_venda', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger("id_venda");
            $table->unsignedBigInteger("id_produto");
            $table->integer("quantidade");
            $table->timestamps();

            $table->foreign('id_venda')->references('id')->on('venda');
            $table->foreign('id_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda_produtos_venda');
    }
};
