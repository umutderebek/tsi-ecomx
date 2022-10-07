<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemaAyarlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema_ayarlar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adres')->nullable();
            $table->string('telefon')->nullable();
            $table->string('telefon_2')->nullable();
            $table->string('mail')->nullable();
            $table->string('mail_2')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('link')->nullable();
            $table->string('insta')->nullable();


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
        Schema::dropIfExists('tema_ayarlar');
    }
}
