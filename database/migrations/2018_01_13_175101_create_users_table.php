<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('username', 100)->nullable();
            $table->string('about')->nullable();
            $table->string('phone', 60)->nullable();
            $table->boolean('phone_hidden')->nullable();
            $table->string('email')->unique();
            $table->string('password');

            // authentication
            $table->string('ip_addr', 50)->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->string('api_token', 60)->unique();
            $table->string('email_token', 60)->unique()->nullable();
            $table->boolean('verified_email')->default(false);

            // manage
            $table->boolean('active')->nullable()->default(true);
            $table->boolean('blocked')->nullable()->default(false);
            $table->boolean('closed')->nullable()->default(false);


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
