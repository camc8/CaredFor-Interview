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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_external_id');
            $table->string('appointment_date');
            $table->string('timezone')->default('America/Chicago');
            $table->string('type');
            $table->string('provider_external_id');
            $table->string('provider_name');
            $table->string('location_external_id');
            $table->string('user_external_id');
            $table->string('meeting_id');
            $table->string('meeting_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
