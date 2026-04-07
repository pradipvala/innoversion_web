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
        Schema::create('app_support', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('technologies')->nullable();
            $table->string('website')->nullable();

            $table->string('phone_no')->nullable();
            $table->string('email')->nullable();

            $table->timestamp('time_to_connect')->nullable();
            $table->string('connection_medium')->nullable();
            
            $table->text('remark')->nullable();

            
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
        Schema::dropIfExists('app_support');
    }
};
