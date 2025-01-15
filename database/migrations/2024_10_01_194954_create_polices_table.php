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
        Schema::create('polices', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // Police officer's name
            $table->string('batchnumber')->unique();  // Unique batch number
            $table->string('area_of_work');  // Area of work or jurisdiction
            $table->string('password');  // Password for authentication
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polices');
    }
};
