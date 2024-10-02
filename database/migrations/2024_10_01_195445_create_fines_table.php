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
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('policeid');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('policeid')->references('policeid')->on('police')->onDelete('cascade');
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
