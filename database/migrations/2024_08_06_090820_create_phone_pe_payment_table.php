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
        Schema::create('phone_pe_payment', function (Blueprint $table) {
            
            $table->id();
            
            $table->string('amount')->nullable();
            $table->text('transaction_id')->nullable();
            $table->text('payment_status')->nullable();
            $table->text('response_msg')->nullable();
            $table->text('providerReferenceId')->nullable();
            $table->text('merchantOrderId')->nullable();
            $table->text('checksum')->nullable();
            
            $table->enum('status',['0','1'])->default('1');
            
            $table->softdeletes();
            $table->timestamps();

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->index(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_pe_payment');
    }
};
