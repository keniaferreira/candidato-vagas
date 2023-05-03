<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableVagas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('descricao');
            $table->enum('tipo', ['clt', 'pj', 'freelancer']);
            $table->enum('situacao', ['ativa', 'inativa'])->default('ativa');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vagas');
    }
}
