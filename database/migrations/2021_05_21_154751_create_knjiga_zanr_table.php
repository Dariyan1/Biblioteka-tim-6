<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigaZanrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('knjiga_zanr', function (Blueprint $table) {
            $table->increments('id');
          
            $table->unsignedBigInteger('knjige_id');
            $table->unsignedBigInteger('zanr_id');
            $table->foreign('knjige_id')->references('id')->on('knjiges')->onDelete('cascade');
            $table->foreign('zanr_id')->references('id')->on('zanrs')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knjiga_zanr');
    }
}
