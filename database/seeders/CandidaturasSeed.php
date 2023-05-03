<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Candidaturas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CandidaturasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Candidaturas::factory()->count(300)->create();
    }
}
