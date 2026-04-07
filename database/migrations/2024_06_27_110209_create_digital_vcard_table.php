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
        Schema::create('digital_vcard', function (Blueprint $table) {
            $table->id();
            $table->string('company_logo')->nullable();

            $table->string('name')->nullable();
            $table->string('designation')->nullable();

            $table->string('company_name')->nullable();
            $table->text('company_description')->nullable();

            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();

            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();

            $table->string('whatsapp_no')->nullable();
            $table->string('facebook')->nullable();
            $table->string('x_link')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();

            $table->text('generated_vcard_link')->nullable();

            $table->string('wallet_pay_qr_code')->nullable();

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
        Schema::dropIfExists('digital_vcard');
    }
};
