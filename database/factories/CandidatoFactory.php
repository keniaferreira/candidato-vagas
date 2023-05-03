<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Candidato;
use Carbon\Carbon;

class CandidatoFactory extends Factory
{
    protected $model = Candidato::class;

    public function definition()
    {
        return [
            'nome'               => $this->faker->text(20),
            'sobrenome'          => $this->faker->text(29),
            'cpf_cnpj'           => 0 . $this->faker->randomNumber(9),
            'data_nascimento'    => Carbon::today()->subDays(rand(300, 4000)),
            'email'              => $this->faker->unique()->safeEmail(),
            'ddd'                => $this->faker->randomElement([31 ,32, 11, 21, 52, 51, 83]),
            'telefone'           => 9 . $this->faker->randomNumber(8),
            'cep'                => $this->faker->randomNumber(8),
            'rua'                => 'Rua' . ' ' . $this->faker->name(),
            'numero'             => $this->faker->randomNumber(2),
            'complemento'        => $this->faker->text(30),
            'bairro'             => 'Bairro' . ' ' . $this->faker->name(),
            'cidade'             => 'Cidade' . ' ' . $this->faker->name(),

            'uf'                 => $this->faker->randomElement(['MG' ,'RJ', 'SP', 'RS']),

            'formacao_academica' => $this->faker->randomElement(['Universidad Europea del Atlántico - Mestrado, Engenharia de Software · (fevereiro de 2023 - fevereiro de 2025)' ,'Universidade Federal de Minas Gerais - Especialização, Engenharia de Software · (2015 - 2016)', 'Anhanguera Educacional Bacharelado, Sistemas de Informação · (2009 - 2013)']),

            'experiencia'        => $this->faker->randomElement(['Analista De Desenvolvimento -  setembro de 2013 - março de 2016 (2 anos 7 meses)' ,'Analista de Desenvolvimento - abril de 2019 - outubro de 2020 (1 ano 7 meses)', 'Analista de Dados - junho de 2018 - abril de 2019 (11 meses)']),

            'idiomas'            => $this->faker->randomElement(['português (nativo), inglês (intermediário)' ,'português (nativo), alemão (intermediário)', 'português (nativo), espanhol(intermediário)', 'português (nativo), inglês (fluente)']),

            'competencias'       => $this->faker->randomElement(['PostgreSQL, HTML, Mysql, PHP, Jquery, CSS, Boootstrap' , 'PostgreSQL, HTML, Mysql, JAVA, Jquery, CSS, Boootstrap', 'HTML, Mysql, PHP, C#, CSS, Boootstrap']),

            'certificados'       => $this->faker->randomElement(['Full Stack PHP Developer, Mindset Empreendedor' , 'Full Stack Java Developer, Modelagem De Software', 'Full Stack C# Developer, Modelagem De Software']),

            'links'              => 'https://www.linkedin.com/in/' . $this->faker->randomNumber(5) . ', ' .  'https://github.com/' . $this->faker->randomNumber(5),
        ];
    }
}
