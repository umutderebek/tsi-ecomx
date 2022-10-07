<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('languageId');
            $table->string('chapter');
            $table->string('chapterSub');
            $table->text('value');
            $table->integer('dataId');
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
        Schema::dropIfExists('language_contents');
    }
}
