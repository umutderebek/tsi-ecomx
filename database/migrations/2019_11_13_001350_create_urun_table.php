<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersorder', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->string('type')->nullable();
            $table->string('urun_title',150);
            $table->string('urun_alt_title',150);
            $table->string('urun_slogan1')->nullable();
            $table->string('urun_slogan2')->nullable();
            $table->string('urun_slogan3')->nullable();
            $table->text('urun_aciklama')->nullable();
            $table->string('urun_resmi')->nullable();
            $table->string('overview_title1')->nullable();
            $table->string('overview_yazi1')->nullable();
            $table->string('overview_yazi2')->nullable();
            $table->string('overview_yazi3')->nullable();
            $table->string('overview_title-2')->nullable();
            $table->string('overview_yazi4')->nullable();
            $table->string('overview_yazi5')->nullable();
            $table->string('feautres')->nullable();
            $table->string('specs')->nullable();
            $table->string('ordering-info')->nullable();
            $table->string('seo-title')->nullable();
            $table->string('seo-description')->nullable();
            $table->string('seo-keywords')->nullable();
            $table->boolean('yayın')->default(false);
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
        Schema::dropIfExists('usersorder');
    }
}
