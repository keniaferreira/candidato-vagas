<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCandidaturas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_candidato')->unsigned();
            $table->bigInteger('id_vaga')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_candidato')->references('id')->on('candidato')->onDelete('restrict');
            $table->foreign('id_vaga')->references('id')->on('vagas')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign(['id_candidato']);
        $table->dropForeign(['id_vaga']);
        Schema::dropIfExists('candidaturas');
    }
}
