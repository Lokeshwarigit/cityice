<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('appointmentscheduled', function (Blueprint $table) {
            $table->id();
            $table->date('request_date');
            $table->string('customer_name');
            $table->string('contact_no');
            $table->string('email');
            $table->text('address');
            $table->date('scheduled_date');
            $table->string('scheduled_time');
            $table->string('services');
            $table->string('staff_remark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointmentscheduled');
    }
};
