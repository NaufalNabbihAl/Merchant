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
        Schema::create('merchant_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merchant_id')
                  ->constrained('merchants')
                  ->onDelete('cascade');
            $table->string('bank_name');
            $table->string('account_number');
            $table->string('account_holder_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchant_accounts');
    }
};
