<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address',50)->nullable();
            $table->string('user-agent')->nullable();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->enum('user_type', ['admin', 'user'])->nullable();
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
        Schema::dropIfExists('users_logs');
    }
}
