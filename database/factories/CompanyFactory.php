<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $coordinates = $this->faker->localCoordinates();

        $latitude = $coordinates['latitude'];
        $longitude = $coordinates['longitude'];

        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' => $this->faker->fixturesImage('companies', 'companies'),
            'address' => $this->faker->address(),
            'coordinates' => "$latitude, $longitude"
        ];
    }
}
