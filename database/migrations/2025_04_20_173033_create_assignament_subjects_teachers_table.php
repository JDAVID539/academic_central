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
        Schema::create('assignment_submissions', function (Blueprint $table) {
           $table->id();

           $table->unsignedBigInteger('subject_id');
           $table->foreign('subject_id')
           ->references('id')
           ->on('subjects')
           ->onDelete('cascade')
           ->onUpdate('cascade');

           $table->unsignedBigInteger('teacher_id');
           $table->foreign('teacher_id')
           ->references('id')
           ->on('teachers')
           ->onDelete('cascade')
           ->onUpdate('cascade');

        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignament_subjects_teachers');
    }
};
