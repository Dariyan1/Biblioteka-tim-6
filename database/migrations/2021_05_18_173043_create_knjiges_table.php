<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKnjigesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knjiges', function (Blueprint $table) {
            $table->id();
            
            $table->string('naslov', 256);
            $table->biginteger('brojStrana');
          
            $table->unsignedBigInteger('pismo_id');
           
            $table->unsignedBigInteger('jezik_id');
          
            $table->unsignedBigInteger('povez_id');
            
            $table->unsignedBigInteger('format_id');
         
            $table->unsignedBigInteger('izdavac_id');
            
            $table->date('datumIzdavanja');
            $table->string('ISBN', 20);
            $table->biginteger('ukupnoPrimjeraka');
            $table->biginteger('izdatoPrimjeraka');
            $table->biginteger('rezervisanoPrimjeraka');
            $table->string('sadrzaj', 4128);

            $table->foreign('pismo_id')->references('id')->on('pismos')->onDelete('cascade');
            $table->foreign('jezik_id')->references('id')->on('jeziks')->onDelete('cascade');
            $table->foreign('povez_id')->references('id')->on('povezs')->onDelete('cascade');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            $table->foreign('izdavac_id')->references('id')->on('izdavacs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knjiges');
    }
}
