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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')
                  ->constrained('merchants')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('photo');
            $table->integer('price');
            $table->foreignId('type_food_id')
                  ->constrained('types_food')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
