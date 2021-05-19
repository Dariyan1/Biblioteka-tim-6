<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliotekarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotekaris', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('imePrezime');
            $table->string('JMBG');
            $table->string('email');
            $table->string('korisnickoIme');
            $table->string('sifra');
            $table->string('ikonica');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliotekaris');
    }
}
