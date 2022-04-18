<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('is_superuser')->nullable();
            $table->string('ordersetfrom')->nullable();
            $table->string('ordersetsubject')->nullable();
            $table->string('ordersetcontent')->nullable();
            $table->string('confirmsetfrom')->nullable();
            $table->string('confirmsetsubject')->nullable();
            $table->string('confirmsetcontent')->nullable();
            $table->string('declinedsetfrom')->nullable();
            $table->string('declinedsetsubject')->nullable();
            $table->string('setcolor')->nullable();
            $table->string('setcalendar')->nullable();
            $table->string('own_id')->nullable();
            $table->string('setpayment')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
