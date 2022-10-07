<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment', function (Blueprint $table) {
            $table->increments('id');

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

            $table->foreign('treatmentkategori_id')->references('id')->on('treatmentkategori')->onDelete('cascade');

            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatment');
    }
}
