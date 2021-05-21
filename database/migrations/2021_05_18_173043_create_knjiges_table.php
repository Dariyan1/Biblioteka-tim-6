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
            $table->timestamps();
            $table->string('naslov', 256);
            $table->int('brojStrana');
            $table->int('pismoId');
            $table->int('jezikId');
            $table->int('povezId');
            $table->int('formatId');
            $table->int('izdavacId');
            $table->date('datumIzdavanja');
            $table->string('ISBN', 20);
            $table->int('ukupnoPrimjeraka');
            $table->int('izdatoPrimjeraka');
            $table->int('rezervisanoPrimjeraka');
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
        Schema::dropIfExists('knjiges');
    }
}
