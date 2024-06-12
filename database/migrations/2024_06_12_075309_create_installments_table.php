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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained();
            $table->unsignedBigInteger('installment_number');
            $table->unsignedBigInteger('installment_amount');
            $table->date('due_date');
            $table->unsignedBigInteger('payment_amount')->nullable();
            $table->date('pay_date')->nullable();
            $table->unsignedBigInteger('delay_penalty')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
