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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('sno');
            $table->string('customer_number');
            $table->string('email');
            $table->text('address');
            $table->text('service_history')->nullable();
            $table->string('status');
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    // public function up(): void
    // // {
    //     Schema::create('customers', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
