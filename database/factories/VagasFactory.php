<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Vagas;

class VagasFactory extends Factory
{
    protected $model = Vagas::class;

    public function definition()
    {
        return [
            'titulo'    => 'Vaga' . ' ' . $this->faker->randomElement(['Desenvolvedor' ,'Analista De Sistemas', 'Analista De Dados']) . ' ' . $this->faker->randomElement(['Junior' ,'Pleno', 'Sênior']),
            'descricao' => $this->faker->text(500),
            'tipo'      => $this->faker->randomElement(['clt' ,'pj', 'freelancer']),
        ];
    }
}
