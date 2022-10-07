<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIletisimAyarlarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iletisim_ayarlar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('adres')->nullable();
            $table->string('telefon')->nullable();
            $table->string('telefon_2')->nullable();
            $table->string('mail')->nullable();
            $table->string('mail2')->nullable();
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
        Schema::dropIfExists('iletisim_ayarlar');
    }
}
