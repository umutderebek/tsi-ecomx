<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xx', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned()->nullable();

            $table->integer('treatmentkategori_id')->unsigned()->nullable();

            $table->string('slug')->unique();

            $table->string('post_baslik',150);

            $table->text('yazi');

            $table->string('kimage')->nullable();

            $table->string('gimage')->nullable();

            $table->string('blog_aciklama');

            $table->string('blog_keyword');

            $table->boolean('yayın')->default(false);

            $table->boolean('taslak')->default(false);

            $table->timestamps();

            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xx');
    }
}
