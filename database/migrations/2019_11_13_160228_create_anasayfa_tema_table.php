<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnasayfaTemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anasayfa_tema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slider_foto')->nullable();
            $table->string('slider_foto1')->nullable();
            $table->string('slider_foto2')->nullable();
            //--------------------Section1------------------------------
            $table->string('section_foto1')->nullable();
            $table->string('section_foto2')->nullable();
            $table->string('section_baslik')->nullable();
            $table->string('section_baslik_yazi')->nullable();
            //-----------------Section1 end------------------------------
            //--------------------Section2------------------------------
            $table->string('section2_foto1')->nullable();
            $table->string('section2_foto2')->nullable();
            $table->string('section2_foto3')->nullable();
            $table->string('section2_yazi1')->nullable();
            $table->string('section2_yazi2')->nullable();
            $table->string('section2_yazi3')->nullable();
            //-----------------Section2 end------------------------------
            //--------------------Section3------------------------------
            $table->string('section3_foto1')->nullable();
            $table->string('section3_baslik1')->nullable();
            $table->string('section3_yazi1')->nullable();
            $table->string('section3_yazi1_alt')->nullable();
            $table->string('section3_foto2')->nullable();
            $table->string('section3_baslik2')->nullable();
            $table->string('section3_yazi2')->nullable();
            $table->string('section3_yazi2_alt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anasayfa_tema');
    }
}
