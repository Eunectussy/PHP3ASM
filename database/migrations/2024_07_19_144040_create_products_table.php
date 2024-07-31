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
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->string('name');
            $table->float('price', 10, 2);
            $table->string('description', 500)->nullable();
            $table->unsignedInteger('category_id');
            $table->integer('image')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
