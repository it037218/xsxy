<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReadReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('read_report', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid')->comment('用户openid');
            $table->longText('content')->comment('内容');
            $table->unsignedInteger('likes')->comment('点赞数');
            $table->unsignedInteger('comments')->comment('评论数');
            $table->unsignedInteger('commodity_id')->comment('图书id');
            $table->softDeletes();
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
        Schema::dropIfExists('read_report');
    }
}
