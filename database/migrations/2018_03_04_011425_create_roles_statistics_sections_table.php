<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesStatisticsSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_statistics_sections', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('statistics_section_id')->unsigned();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('statistics_section_id')
                ->references('id')
                ->on('statistics_sections')
                ->onDelete('cascade');

            $table->primary(['role_id', 'statistics_section_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_statistics_sections');
    }
}
