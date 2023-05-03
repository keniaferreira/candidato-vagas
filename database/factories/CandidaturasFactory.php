<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidaturas;

class CandidaturasFactory extends Factory
{
    protected $model = Candidaturas::class;

    public function definition()
    {
        return [
            'id_candidato' => $this->faker->numberBetween($min = 1, $max = 100),
            'id_vaga'      => $this->faker->numberBetween($min = 1, $max = 25),
        ];
    }
}
