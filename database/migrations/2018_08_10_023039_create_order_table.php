<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no')->unique()->comment('订单编号');
            $table->string('openid')->comment('用户openid');
            $table->smallInteger('status')->commnet('订单状态');
            $table->timestamps();
        });
        Schema::create('order_response',function (Blueprint $table){
            $table->increments('id');
            $table->text('response_content')->commnet('接收参数');
            $table->string('return_success');
            $table->string('return_code');
            $table->string('order_no');
            $table->string('openid');
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
        Schema::dropIfExists('order');
        Schema::dropIfExists('order_response');
    }
}
