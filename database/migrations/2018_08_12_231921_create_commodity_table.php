<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommodityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->string('commodity_name');
            $table->integer('stock')->comment('库存');
            $table->string('sale_number', '100')->comment('商品编号');
            $table->unsignedInteger('status')->default('100')->comment('100 初始状态，101，上架，102，下架');
            $table->string('type')->comment('sell/lend');
            $table->decimal('commodity_price', 8, 2)->comment('价格');
            $table->integer('commodity_period')->comment('周期');
            $table->integer('sold_nums')->comment('售出数量');
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
        Schema::dropIfExists('commodity');
    }
}
