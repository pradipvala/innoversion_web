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
        Schema::create('about_us_details', function (Blueprint $table) {
            $table->id();
            
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            
            $table->string('about_us_ceo_image')->nullable();
            $table->text('about_us_ceo_info')->nullable();
            $table->string('ceo_name')->nullable();
            $table->string('ceo_desg')->nullable();
            
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('mission_image')->nullable();
            
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('vision_image')->nullable();
            
            $table->enum('status',['0','1']);
            $table->softdeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us_details');
    }
};
