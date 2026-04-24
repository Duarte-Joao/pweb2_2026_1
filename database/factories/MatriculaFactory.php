<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matricula>
 */
class MatriculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'curso_id' => (\App\Models\Curso::All()->random())->id,
            'turma_id' => (\App\Models\Turma::All()->random())->id,
            'aluno_id' => (\App\Models\Aluno::All()->random())->id,
            'data_matricula' => $this->faker->date(),
        ];
    }
}
