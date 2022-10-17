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
        Schema::create('gate3s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained('trips', 'id');
            $table->string('driver_name');
            $table->bigInteger('licence_no');
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
        Schema::dropIfExists('gate3s');
    }
};
