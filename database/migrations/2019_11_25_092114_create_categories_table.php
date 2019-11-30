<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->char('icon')->nullable();
            $table->string('img')->nullable();
            $table->integer('pid')->nullable();
            $table->integer('type')->nullable()->index();
            $table->integer('num')->nullable()->index();
            $table->integer('haschild')->nullable()->index();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->tinyInteger('is_deleted')->default(1);
            $table->text('ext_url')->nullable();
            $table->text('rich_schema')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_title')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->integer('total_item')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
