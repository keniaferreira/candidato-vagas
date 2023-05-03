<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vagas;

class VagasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vagas::factory()->count(25)->create();
    }
}
