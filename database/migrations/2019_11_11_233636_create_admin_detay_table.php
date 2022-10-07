<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminDetayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_detay', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kulad')->nullable();
            $table->string('unvan')->nullable();
            $table->string('dt')->nullable();
            $table->string('adres')->nullable();
            $table->string('tcno')->nullable();
            $table->string('gsor')->nullable();
            $table->string('image')->nullable();
            $table->string('cinsiyet')->nullable();
            $table->text('hakkimda')->nullable();
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_detay');
    }
}
