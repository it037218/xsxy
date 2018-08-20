<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book_name')->comment('书籍名称');
            $table->string('description')->comment('描述');
            $table->unsignedInteger('type_id')->comment('类型');
            $table->string('author')->comment('作者');
            $table->unsignedInteger('cover_image_id')->comment('封面图片');
            $table->float('price')->comment('图书原价');
            $table->string('source')->comment('图书来源');
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
        Schema::dropIfExists('book');
        Schema::dropIfExists('book_tag');
        Schema::dropIfExists('tag');
    }
}
