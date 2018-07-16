<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBatchReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batch_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id');
            $table->integer('green_tea_jasmine');
            $table->integer('black_tea');
            $table->integer('quan_yin');
            $table->integer('matcha');
            $table->integer('royal');
            $table->integer('coffee');
            $table->integer('choco');
            $table->integer('cheese');
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
        Schema::dropIfExists('batch_reports');
    }
}
