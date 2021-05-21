<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AutorKnjiga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->id();
        $this->int('autor_id')->unsigned();
        $this->foreign('autor')->references('id')->on('autors')->onDelete('cascade');
        $this->int('knjiga_id')->unsigned();
        $this->foreign('knjiga')->references('id')->on('knjigas')->onDelete('cascade');
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