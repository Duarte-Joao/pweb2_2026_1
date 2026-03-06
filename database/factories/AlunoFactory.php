<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoriaAluno;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluno>
 */
class AlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->name,
            'cpf'=>$this->faker->numerify('###.###.###-##'),
            'telefone'=>$this->faker->phoneNumber(),
            'imagem'=>null,
            'categoria_id'=> (CategoriaAluno::all()->random())->id,
        ];
    }
}
