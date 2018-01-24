<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesSidemenuSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_sidemenu_sections', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('sidemenu_section_id')->unsigned();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('sidemenu_section_id')
                ->references('id')
                ->on('sidemenu_sections')
                ->onDelete('cascade');

            $table->primary(['role_id', 'sidemenu_section_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_sidemenu_sections');
    }
}
