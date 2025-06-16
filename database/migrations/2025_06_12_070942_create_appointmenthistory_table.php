<?php

// database/migrations/xxxx_xx_xx_create_appointmenthistory_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('appointmenthistory', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contact_no');
            $table->string('email');
            $table->string('address');
            $table->date('appointment_date');
            $table->string('status')->default('Scheduled');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('appointmenthistory');
    }
};
