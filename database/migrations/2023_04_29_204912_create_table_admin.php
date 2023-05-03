<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('adm_id');
            $table->string('adm_nome',20);
            $table->string('adm_sobrenome',29);
            $table->string('adm_username',20)->unique();            
            $table->string('adm_cpf_cnpj',18)->unique();
            $table->date('adm_data_nasc')->nullable();
            $table->string('adm_email',60)->unique();
            $table->string('adm_pass');
            $table->boolean('adm_ativo')->default(true);
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
        Schema::dropIfExists('admin');
    }
}
