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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                ->constrained('customers')
                ->onDelete('cascade');
            $table->foreignId('merchant_id')
                ->constrained('merchants')
                ->onDelete('cascade');
            $table->dateTime('order_date');
            $table->integer('total_price');
            $table->enum('payment_status', ['unpaid', 'proof_uploaded', 'verified', 'rejected']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
