<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMondaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mondays', function (Blueprint $table) {
            $table->id();
            $table->string('service_id');
            $table->boolean('start_time')->nullable();
            $table->boolean('end_time')->nullable();
            $table->string('date_check')->nullable();
            $table->date('selectdata');
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
        Schema::dropIfExists('mondays');
    }
}