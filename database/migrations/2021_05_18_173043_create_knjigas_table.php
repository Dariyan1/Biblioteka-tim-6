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
            $table->timestamps();
            $table->string('naslov', 256);
            $table->bigInteger('brojStrana');
            //$table->int('pismoId');
            $table->bigInteger('pismo_id')->unsigned();
            $table->foreign('pismo_id')->references('id')->on('pismos')->onDelete('cascade');
            //$table->int('jezikId');
            $table->bigInteger('jezik_id')->unsigned();
            $table->foreign('jezik_id')->references('id')->on('jeziks')->onDelete('cascade');
            //$table->int('povezId');
            $table->bigInteger('povez_id')->unsigned();
            $table->foreign('povez_id')->references('id')->on('povezs')->onDelete('cascade');
            //$table->int('formatId');
            $table->bigInteger('format_id')->unsigned();
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            //$table->int('izdavacId');
            $table->bigInteger('izdavac_id')->unsigned();
            $table->foreign('_id')->references('id')->on('pismos')->onDelete('cascade');
            //End
            $table->date('datumIzdavanja');
            $table->string('ISBN', 20);
            $table->bigInteger('ukupnoPrimjeraka');
            $table->bigInteger('izdatoPrimjeraka');
            $table->bigInteger('rezervisanoPrimjeraka');
            $table->string('sadrzaj', 4128);


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
