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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            

        $table->string('name');
        $table->string('name_school'); 
        $table->string('address');
        $table->string('city');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('password')->nullable();
        $table->string('photo')->nullable();
        $table->timestamps();
           
         $table->unsignedBigInteger('super_administrador_id')->nullable();
            $table->foreign('super_administrador_id')
            ->references('id')
            ->on('super_administradors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
