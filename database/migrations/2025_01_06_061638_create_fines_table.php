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
                $table->string('name');
                $table->date('date');
                $table->string('location');
                $table->text('description')->nullable();
                $table->decimal('amount', 8, 2);
                $table->boolean('status')->default(0);
                $table->unsignedBigInteger('driver_id'); // Matches drivers.id
                $table->unsignedBigInteger('police_id'); // Matches police.policeid
                $table->unsignedBigInteger('vehicle_id'); // Matches vehicle.id
                $table->timestamps();

                // Foreign key constraints
                $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade');
                $table->foreign('police_id')->references('id')->on('polices')->onDelete('cascade');
                $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
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
