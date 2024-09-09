<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountbanks', function (Blueprint $table) {
            $table->id();   
            $table->bigInteger('general_id')->unsigned();
            $table->bigInteger('bank_id')->unsigned();         
            $table->string('no_rek')->nullable();            
            $table->string('pemilik')->nullable();
            $table->timestamps();
        });
        Schema::table('accountbanks', function (Blueprint $table) {
            $table->foreign('general_id')->references('id')->on('generals');
        });
        Schema::table('accountbanks', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accountbanks');
    }
}
