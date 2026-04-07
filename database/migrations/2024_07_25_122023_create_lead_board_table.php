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
        Schema::create('lead_board', function (Blueprint $table) {
            $table->id();

            $table->string('business_name')->nullable();
            

            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();

            $table->string('file')->nullable();

            $table->enum('status', array('active', 'inactive', 'pending','deleted'))->default('active');
            
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
        Schema::dropIfExists('lead_board');
    }
};
