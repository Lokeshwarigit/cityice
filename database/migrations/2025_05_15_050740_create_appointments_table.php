<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('appointments', function (Blueprint $table) {

        $table->id();
        $table->integer('sno');
        $table->date('request_date');
        $table->string('customer_name');
        $table->string('contact_no', 20);
        $table->string('email');
        $table->text('address');
        $table->date('preferred_date');
        $table->time('preferred_time');
        $table->enum('services', ['Completed', 'Assigned', 'Pending'])->default('Pending');
        $table->timestamps();
    
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
