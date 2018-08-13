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
            $table->string('email')->unique();
            $table->string('openid')->unique();
            $table->string('user_type')->comment('用户类型：normal/vip');
            $table->string('password');
            $table->string('avatar_url')->comment('用户头像');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::create('user_')
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
