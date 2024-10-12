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
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                  ->constrained('customers')
                  ->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->string('province');
            $table->string('regency');
            $table->string('district');
            $table->string('village');
            $table->string('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_profiles');
    }
};
