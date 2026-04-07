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
        Schema::create('franchise', function (Blueprint $table) {
            $table->id();

            $table->string('business_name')->nullable();
            $table->string('franchise_name')->nullable();
            $table->string('gst_no')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email')->nullable();


            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            
            $table->string('contact_person')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('aadhaar_no')->nullable();
            $table->string('pan_img')->nullable();
            $table->string('aadhaar_img')->nullable();

            $table->string('gst_certificate')->nullable();
            $table->text('franchise_code')->nullable();
            
            $table->string('approval_status')->nullable();
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
        Schema::dropIfExists('franchise');
    }
};
