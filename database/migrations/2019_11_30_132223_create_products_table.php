<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->integer('cat_id')->index();
            $table->string('code')->index()->nullable()->comment("mã sản phẩm");
            $table->integer('price')->default(0);
            $table->tinyInteger('hot')->default(0);
            $table->integer('sale')->default(0);
            $table->integer('author_id')->index()->default(0);
            $table->integer('view')->default(0);
            $table->string('img')->nullable();
            $table->text('img_list')->nullable();
            $table->text('attr')->nullable()->comment("thuộc tính sản phẩm");
            $table->text('tag')->nullable();
            $table->integer('type')->nullable()->index();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('ext_url')->nullable();
            $table->text('rich_schema')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_title')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->tinyInteger('pay')->default(0);
            $table->tinyInteger('number')->default(0);
            $table->tinyInteger('is_noindex')->default(0);
            $table->integer('total_rating')->default(0)->comment("tổng số đánh giá");
            $table->integer('total_number')->default(0)->comment("tổng số điểm đánh giá");
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
        Schema::dropIfExists('products');
    }
}
