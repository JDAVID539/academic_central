<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); 
            
        });

        // Insertar roles 
        DB::table('roles')->insert([
            ['name' => 'estudiante'],
            ['name' => 'profesor'],
            ['name' => 'moderador'],
        ]);
    }

    
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
