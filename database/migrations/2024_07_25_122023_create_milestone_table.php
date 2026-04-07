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
        Schema::create('milestone', function (Blueprint $table) {
            $table->id();

            $table->integer('project_task_id')->nullable();

            $table->string('milestone_description')->nullable();
            
            $table->enum('status',['0','1'])->default('1');

            $table->enum('task_status',['open', 'work_in_progress ', 'approved ', 'reopen', 'completed'])->default('open');
            
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
        Schema::dropIfExists('milestone');
    }
};
