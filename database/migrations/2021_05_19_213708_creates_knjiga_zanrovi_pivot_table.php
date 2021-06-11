<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesKnjigaZanroviPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knjiga_zanrovi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zanrovi_id');
            $table->unsignedBigInteger('knjiga_id');     
            $table->foreign('zanrovi_id')->references('id')->on('zanrovis')->onDelete('cascade');
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
        Schema::dropIfExists('knjiga_zanrovi');
    }
}
