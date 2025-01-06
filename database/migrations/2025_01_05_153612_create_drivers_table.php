<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID for the driver record
            $table->string('first_name');
            $table->string('last_name');
            $table->string('license_number')->unique(); // Unique license number for the driver
            $table->date('license_issue_date');
            $table->date('license_expiry_date');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key to the users table
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
