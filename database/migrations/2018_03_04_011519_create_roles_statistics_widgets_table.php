<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesStatisticsWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_statistics_widgets', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('statistics_widget_id')->unsigned();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('statistics_widget_id')
                ->references('id')
                ->on('statistics_widgets')
                ->onDelete('cascade');

            $table->primary(['role_id', 'statistics_widget_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_statistics_widgets');
    }
}
