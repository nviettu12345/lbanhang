<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name')->unique();
            $table->string('slug')->index();
            $table->integer('cat_id')->index();
            $table->tinyInteger('hot')->default(0);
            $table->integer('author_id')->index()->default(0);
            $table->integer('view')->default(0);
            $table->string('img')->nullable();
            $table->text('tag')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('ext_url')->nullable();
            $table->text('rich_schema')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_title')->nullable();
            $table->tinyInteger('active')->default(1)->index();
            $table->tinyInteger('is_noindex')->default(0);
            $table->timestamp('publish_date');
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
        Schema::dropIfExists('articles');
    }
}
