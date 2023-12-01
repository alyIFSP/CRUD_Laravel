<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Maternidade;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maternidade>
 */
class MaternidadeFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   **/
  public function definition(): array
  {
    return [
      //
      "name" => $this->faker->randomElement(['Teste do pezinho', 'Ultrassom', 'Hemograma']),
      "category" => $this->faker->randomElement(['Exame', 'Atendimento']),
      "value" => $this->faker->numberBetween(1, 350),
    ];
  }
}
