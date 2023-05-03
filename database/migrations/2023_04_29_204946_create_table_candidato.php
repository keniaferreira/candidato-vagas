<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCandidato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato', function (Blueprint $table) {
            $table->id();
            $table->string('nome',20);
            $table->string('sobrenome',29);           
            $table->string('cpf_cnpj',18)->unique();
            $table->date('data_nascimento')->nullable();
            $table->string('email',60)->unique();
            $table->string('ddd',3);
            $table->string('telefone',13);
            $table->string('cep',10);
            $table->string('rua',80);
            $table->string('numero',20);
            $table->string('complemento',40)->nullable();
            $table->string('bairro',60);
            $table->string('cidade',60);
            $table->string('uf',2);
            $table->text('formacao_academica');
            $table->text('experiencia');
            $table->string('idiomas');
            $table->text('competencias');
            $table->text('certificados');
            $table->text('links');
            $table->boolean('ativo')->default(true);
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
        Schema::dropIfExists('candidato');
    }
}
