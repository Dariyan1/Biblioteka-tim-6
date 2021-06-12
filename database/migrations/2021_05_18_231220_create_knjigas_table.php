<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knjigas', function (Blueprint $table) {
            $table->id();
            $table->string('Naslov');
            $table->integer('BrojStrana');
            $table->string('Foto')->nullable();
            $table->unsignedBigInteger('pismo_id');
            $table->unsignedBigInteger('jezik_id');
            $table->unsignedBigInteger('povez_id');
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('izdavac_id');
            $table->year('DatumIzdavanja');
            $table->string('ISBN');
            $table->integer('UkupnoPrimjeraka');
            $table->integer('IzdatoPrimjeraka')->default('0');
            $table->integer('RezervisanoPrimjeraka')->default('0');
            $table->string('Sadrzaj')->nullable();
            $table->foreign('pismo_id')->references('id')->on('pismos')->onDelete('cascade');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            $table->foreign('jezik_id')->references('id')->on('jeziks')->onDelete('cascade');
            $table->foreign('povez_id')->references('id')->on('povezs')->onDelete('cascade');
            $table->foreign('izdavac_id')->references('id')->on('izdavacs')->onDelete('cascade');
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
        Schema::dropIfExists('knjigas');
    }
}
