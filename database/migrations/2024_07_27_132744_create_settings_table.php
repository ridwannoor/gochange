<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('session_name')->nullable();
            $table->string('ip_mikrotik')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('port')->nullable();
            $table->string('hotspot_name')->nullable();
            $table->string('dns_name')->nullable();
            $table->string('currency')->nullable();
            $table->string('session_timeout')->nullable();
            $table->string('live_report')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
