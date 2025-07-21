<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_product_appointment_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('booking_product_id');
            $table->integer('duration')->nullable();
            $table->integer('break_time')->nullable();
            $table->boolean('same_slot_all_days')->nullable();
            $table->json('slots')->nullable();

            // Fix: shortened foreign key name
            $table->foreign('booking_product_id', 'booking_product_fk')
                  ->references('id')->on('booking_products')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_product_appointment_slots');
    }
};
