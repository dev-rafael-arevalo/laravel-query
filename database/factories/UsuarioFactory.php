<?php

namespace Database\Factories;

// database/factories/UsuarioFactory.php
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'correo' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
        ];
    }
}
