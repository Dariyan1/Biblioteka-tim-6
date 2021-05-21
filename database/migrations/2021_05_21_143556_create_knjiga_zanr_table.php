<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KnjigaZanr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->id();
        $this->int('zanr_id')->unsigned();
        $this->foreign('zanr')->references('id')->on('zanrs')->onDelete('cascade');
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
        Schema::dropIfExists('knjiga_zanr');
    }
}
