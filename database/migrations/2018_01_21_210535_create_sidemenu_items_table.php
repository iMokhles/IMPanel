<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidemenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidemenu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->nullable()->unsigned();
            $table->integer('parent_id')->default(0)->unsigned();

            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('icon', 255)->nullable();
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
        Schema::dropIfExists('sidemenu_items');
    }
}
