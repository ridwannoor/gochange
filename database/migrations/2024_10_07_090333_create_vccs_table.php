<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVccsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vccs', function (Blueprint $table) {
            $table->id();
            $table->string('no_telp')->nullable();
            $table->bigInteger('jenisvcc_id')->unsigned();
            $table->bigInteger('metodebayar_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('vccs', function (Blueprint $table) {
            $table->foreign('jenisvcc_id')->references('id')->on('jenisvccs');
        });
        Schema::table('vccs', function (Blueprint $table) {
            $table->foreign('metodebayar_id')->references('id')->on('metodebayars');
        });
        Schema::table('vccs', function (Blueprint $table) {
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
        Schema::dropIfExists('vccs');
    }
}
