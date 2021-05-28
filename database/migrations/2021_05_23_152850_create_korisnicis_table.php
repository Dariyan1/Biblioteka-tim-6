<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorisnicisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korisnicis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('tipkorisnika_id');
          
            $table->string('imePrezime');
            $table->string('JMBG');
            $table->string('email');
            $table->string('korisnickoIme');
            $table->string('sifra');
            $table->string('ikonica');
            
            $table->foreign('tipkorisnika_id')->references('id')->on('tip_korisnika')->onDelete('cascade');

            
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('korisnicis');
    }

}