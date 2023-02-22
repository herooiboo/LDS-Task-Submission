<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'contact_number' => Str::limit($this->faker->unique()->phoneNumber(), 15, ''),
            'first_name' => Str::limit($this->faker->firstName(), 50, ''),
            'last_name' => Str::limit($this->faker->lastName(), 50, ''),
            'address' => Str::limit($this->faker->address(), 50, ''),
            'details' =>  Str::limit($this->faker->paragraph(5), 200, ''),
        ];
    }
}
