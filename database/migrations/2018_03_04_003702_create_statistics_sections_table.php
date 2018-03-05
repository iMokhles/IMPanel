<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('statistics_page_id')->unsigned()->index()->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('cols')->default(4)->length(1);
            $table->unsignedInteger('sort')->nullable();
            $table->boolean('is_active')->default(true);

            $table->foreign('statistics_page_id')
                ->references('id')
                ->on('statistics_pages')
                ->onDelete('cascade');

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
        Schema::dropIfExists('statistics_sections');
    }
}
