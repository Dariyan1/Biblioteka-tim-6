<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorijaKnjigaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
            
            Schema::create('kategorija_knjiga', function (Blueprint $table) {
                $table->increments('id');
            
                $table->unsignedBigInteger('knjige_id');
                $table->unsignedBigInteger('kategorija_id');
                $table->foreign('knjige_id')->references('id')->on('knjiges')->onDelete('cascade');
                $table->foreign('kategorija_id')->references('id')->on('kategorijes')->onDelete('cascade');
            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategorija_knjiga');
    }
}
