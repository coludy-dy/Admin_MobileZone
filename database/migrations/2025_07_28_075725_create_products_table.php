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
            $table->string('name');
            $table->string('img_name')->nullable();
            $table->string('img_path')->nullable();
            $table->string('description');
            $table->string('brand_id');
            $table->string('color');
            $table->string('price');
            $table->string('ram');
            $table->string('storage');
            $table->string('camera');
            $table->string('battery');
            $table->string('screen_size');
            $table->integer('stock');
            $table->enum('status',['available','out_of_stock']);
            $table->timestamps();
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
