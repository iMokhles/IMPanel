<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesSidemenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_sidemenu_items', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('sidemenu_item_id')->unsigned();

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('sidemenu_item_id')
                ->references('id')
                ->on('sidemenu_items')
                ->onDelete('cascade');

            $table->primary(['role_id', 'sidemenu_item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_sidemenu_items');
    }
}
