<?php

namespace Database\Factories;

use App\Models\Organization\Organization;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    /** @var string */
    protected $model = Organization::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'user_id' => 2,
            'address' => $this->faker->address,
            'email' => $this->faker->companyEmail,
            'website' => $this->faker->url,
            'phone' => (int) $this->faker->phoneNumber,
        ];
    }
}
