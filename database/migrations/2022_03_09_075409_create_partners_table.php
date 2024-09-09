<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('badan_id')->unsigned();
            $table->string('nama_perusahaan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->string('kontak_person')->nullable();
            $table->string('phone')->nullable();
            $table->string('npwp')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->foreign('badan_id')->references('id')->on('badans');
        });

        Schema::table('partners', function (Blueprint $table) {
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
        Schema::dropIfExists('partners');
    }
}
