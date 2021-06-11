<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesKategorijeKnjigaPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorije_knjiga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategorije_id');
            $table->unsignedBigInteger('knjiga_id');
            $table->foreign('kategorije_id')->references('id')->on('kategorijes')->onDelete('cascade');
            $table->foreign('knjiga_id')->references('id')->on('knjigas')->onDelete('cascade');
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
        Schema::dropIfExists('kategorije_knjiga');
    }
}
