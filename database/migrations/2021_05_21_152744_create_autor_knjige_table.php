<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutorKnjigeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('autor_knjige', function (Blueprint $table) {
            $table->increments('id');
          
            $table->unsignedBigInteger('knjige_id');
            $table->unsignedBigInteger('autor_id');
            $table->foreign('knjige_id')->references('id')->on('knjiges')->onDelete('cascade');
            $table->foreign('autor_id')->references('id')->on('autors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autor_knjiga');
    }
}
