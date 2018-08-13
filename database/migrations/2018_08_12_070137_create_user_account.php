<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_account',function (Blueprint $table){
            $table->unsignedInteger('id');
            $table->string('openid')->comment('用户openid');
            $table->float('total_account')->commnet('账户总金额');
            $table->float('use_account')->commnet('可用金额');
            $table->float('frozen_account')->comment('冻结金额');
            $table->string('bank_name')->comment('开户银行');
            $table->string('bank_account')->comment('银行卡号');
            $table->string('bank_username')->comment('银行卡持有者姓名');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_account_log',function (Blueprint $table){
            $table->unsignedInteger('id');
            $table->string('openid');
            $table->float('account');
            $table->string('type')->comment('recharge/withdraw/frozen');
            $table->boolean('remark')->commnet();
            $table->string('order_no')->comment('订单编号');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_account');
        Schema::dropIfExists('user_account_log');

    }
}
