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
        Schema::create('detail_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->unsignedBigInteger('feature_id')->unsigned();
            $table->text('description')->max(100);
            $table->string('value')->max(30);
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDeelete('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDeelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_products');
    }
};
