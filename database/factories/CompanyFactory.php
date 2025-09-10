<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'industry' => $this->faker->text(255),
            'address' => $this->faker->text(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'website' => $this->faker->text(255),
            'pic_name' => $this->faker->text(255),
            'pic_position' => $this->faker->text(255),
            'pic_phone' => $this->faker->text(255),
            'created_by' => \App\Models\User::factory(),
        ];
    }
}
