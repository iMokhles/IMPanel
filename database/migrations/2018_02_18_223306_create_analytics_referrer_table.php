<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalyticsReferrerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analytics_referrer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('visits')->nullable();
            $table->string('ip_addr', 50)->nullable();
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
        Schema::dropIfExists('analytics_referrer');
    }
}
