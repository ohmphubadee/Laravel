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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();          
            $table->unsignedBigInteger('parking_lot_id');
            $table->unsignedBigInteger('parking_slot_id');
            $table->dateTime('check_in_time');
            $table->dateTime('check_out_time')->nullable();
            $table->float('total_charge')->nullable();
            $table->timestamps();
            $table->foreign('parking_slot_id')->references('id')->on('parking_slots');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
