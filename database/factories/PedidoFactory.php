<?php

namespace Database\Factories;

// database/factories/PedidoFactory.php
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;
use App\Models\Usuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'producto' => $this->faker->word(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'usuario_id' => Usuario::factory(),
        ];
    }
}
