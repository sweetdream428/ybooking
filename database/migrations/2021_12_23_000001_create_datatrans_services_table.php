<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatatransServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datatrans_services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('duration')->default(900);
            $table->string('duration_name')->default('15 min');
            $table->decimal('price')->default(0.00);
            $table->boolean('sun')->nullable();
            $table->boolean('mon')->nullable();
            $table->boolean('tue')->nullable();
            $table->boolean('wed')->nullable();
            $table->boolean('thu')->nullable();
            $table->boolean('fri')->nullable();
            $table->boolean('sat')->nullable();
            $table->string('allow');
            $table->string('own_id');
            $table->string('category')->nullable();
            $table->string('location')->nullable();
            $table->string('employee')->nullable();
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
        Schema::dropIfExists('datatrans_services');
    }
}
