<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'jobtitle' => $this->faker->jobTitle()
        ];
    }
}
