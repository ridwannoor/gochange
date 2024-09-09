<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicedetails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('invoiceheader_id')->unsigned();
            $table->string('deskripsi')->nullable();
            $table->string('qty')->nullable();
            $table->string('harga')->nullable();
            $table->timestamps();
        });

        Schema::table('invoicedetails', function (Blueprint $table) {
            $table->foreign('invoiceheader_id')->references('id')->on('invoiceheaders');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoicedetails');
    }
}
