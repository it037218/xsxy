<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('commodity_id')->comment('商品编号');
            $table->string('source','20')->comment('来源：borrow/person');
            $table->double('latitude',10,6);
            $table->double('longitude',10,6);
            $table->string('location_name',100)->comment('坐标名称');
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
        Schema::dropIfExists('borrow_locations');
    }
}
