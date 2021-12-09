<?php

namespace Database\Factories;

use App\Models\Employer\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployerFactory extends Factory
{
    /** @var string */
    protected $model = Employer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'passport_serial_number' => $this->faker->randomNumber(6),
            'surname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'patronymic' => $this->faker->name,
            'position' => $this->faker->company,
            'phone' => (int) $this->faker->phoneNumber,
            'address' => $this->faker->address
        ];
    }
}
