<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatisticsWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics_widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('statistics_section_id')->unsigned()->index()->nullable();
            $table->enum('type', ['small-box', 'pie_chart', 'chart_canvas', 'table'])->default('small-box');
            $table->enum('size', ['3', '4', '6', '8', '12'])->default('3');

            $table->string('icon')->nullable();
            $table->string('name')->nullable();
            $table->longText('sql')->nullable();

            $table->integer('sort')->nullable();
            $table->boolean('is_active')->default(true);

            $table->foreign('statistics_section_id')
                ->references('id')
                ->on('statistics_sections')
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
        Schema::dropIfExists('statistics_widgets');
    }
}
