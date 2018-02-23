<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFooterBtnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_btns', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->default(0)->unsigned();

            $table->string('name')->nullable();
            $table->string('icon')->nullable();
            $table->string('path')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('footer_btns');
    }
}
