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
            $table->id();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->string('name',30);
            $table->text('description')->max(100);
            $table->boolean('status');
            $table->float('price');
            $table->Integer('stock');
            $table->Integer('min_stock')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDeelete('cascade');
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
