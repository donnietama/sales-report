<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_summaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id');
            $table->date('date');
            $table->string('gross');
            $table->string('nett');
            $table->string('voucher');
            $table->string('cash');
            $table->string('card');
            $table->string('ticket');
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
        Schema::dropIfExists('report_summaries');
    }
}
