<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->text('content')->nullable();
            $table->integer('comp')->index();
            $table->integer('pid')->index();
            $table->tinyInteger('is_deleted')->default(1);
            $table->tinyInteger('type')->index()->comment("loại tin tức/bài viết: ngẫu nhiên, hot");
            $table->text("cattype")->comment("loại danh mục");
            $table->tinyInteger("num")->index()->default(0);
            $table->tinyInteger("active")->index()->default(1);
            $table->tinyInteger("qlimit")->default(8)->comment("giới hạn bài viết/sản phẩm");
            $table->tinyInteger("is_show_title")->default(1);
            $table->tinyInteger("column")->default(4);
            $table->text("img_list")->nullable(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
