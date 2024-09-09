<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceheadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

   

    public function up()
    {
        Schema::create('invoiceheaders', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice')->nullable();
            $table->string('no_po')->nullable();
            // $table->date('tgl_po')->nullable();
            $table->bigInteger('partner_id')->unsigned();
            $table->string('perihal')->nullable();
            $table->string('tgl_invoice')->nullable();
            $table->text('catatan')->nullable();
            $table->string('pajak')->nullable();
            $table->string('diskon')->nullable();
            $table->string('ppn')->nullable();
            $table->string('lainnya')->nullable();
            $table->string('total')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });

        Schema::table('invoiceheaders', function (Blueprint $table) {
            $table->foreign('partner_id')->references('id')->on('partners');
        });

        Schema::table('invoiceheaders', function (Blueprint $table) {
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
        Schema::dropIfExists('invoiceheaders');
    }
}
