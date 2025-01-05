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
        if (!Schema::hasTable('fines')) {
            Schema::create('fines', function (Blueprint $table) {
                $table->id('fineid');
                $table->date('date');
                $table->string('location');
                $table->text('description')->nullable();
                $table->decimal('amount', 8, 2);
                $table->unsignedBigInteger('driverid'); // Matches drivers.id
                $table->unsignedBigInteger('policeid'); // Matches police.policeid
                $table->unsignedBigInteger('vehicleid'); // Matches vehicle.id
                $table->timestamps();

                // Foreign key constraints
                $table->foreign('driverid')->references('id')->on('drivers')->onDelete('cascade');
                $table->foreign('policeid')->references('policeid')->on('police')->onDelete('cascade');
                $table->foreign('vehicleid')->references('id')->on('vehicle')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};
