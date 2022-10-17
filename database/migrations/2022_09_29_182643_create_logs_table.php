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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained('trips');
            $table->string('gate1in')->nullable();
            $table->string('gate1in_driver_name')->nullable();
            $table->string('gate1in_licence_no')->nullable();
            $table->string('gate2in')->nullable();
            $table->string('gate2in_driver_name')->nullable();
            $table->string('gate2in_licence_no')->nullable();
            $table->string('gate2out')->nullable();
            $table->string('gate2out_driver_name')->nullable();
            $table->string('gate2out_licence_no')->nullable();
            $table->string('gate3in')->nullable();
            $table->string('gate3in_driver_name')->nullable();
            $table->string('gate3in_licence_no')->nullable();
            $table->string('gate3out')->nullable();
            $table->string('gate3out_driver_name')->nullable();
            $table->string('gate3out_licence_no')->nullable();
            $table->string('gate4out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
};
