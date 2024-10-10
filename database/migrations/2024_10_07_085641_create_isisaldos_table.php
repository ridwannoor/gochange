<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsisaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'usd', 'idr', 'email', 'jenissaldo_id', 'metodebayar_id', 'user_id'
        Schema::create('isisaldos', function (Blueprint $table) {
            $table->id();
            $table->string('usd')->nullable();
            $table->string('idr')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('jenissaldo_id')->unsigned();
            $table->bigInteger('metodebayar_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('isisaldos', function (Blueprint $table) {
            $table->foreign('jenissaldo_id')->references('id')->on('jenissaldos');
        });
        Schema::table('isisaldos', function (Blueprint $table) {
            $table->foreign('metodebayar_id')->references('id')->on('metodebayars');
        });
        Schema::table('isisaldos', function (Blueprint $table) {
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
        Schema::dropIfExists('isisaldos');
    }
}
