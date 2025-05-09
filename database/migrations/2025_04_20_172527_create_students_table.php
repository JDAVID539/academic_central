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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('course_id')->nullable();
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('teacher_assigned_id')->nullable();
            $table->foreign('teacher_assigned_id')
            ->references('id')
            ->on('teachers')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')
            ->references('id')
            ->on('schools')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
