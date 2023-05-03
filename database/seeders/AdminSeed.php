<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'adm_nome' => 'Kênia',
            'adm_sobrenome' => 'Ferreira',
            'adm_username' => 'admin',
            'adm_cpf_cnpj' => '535.941.160-00',
            'adm_data_nasc' => '2000-12-01',
            'adm_email'=> 'kenia.recrutadora@rh.com.br',
            'adm_pass' => Hash::make('admin')
        ]);
    }
}
