<?php

namespace Database\Factories;

use App\Models\Potential;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PotentialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Potential::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_type' => $this->faker->text(255),
            'project_name' => $this->faker->text(255),
            'source' => $this->faker->text(255),
            'interest_level' => $this->faker->text(255),
            'estimated_value' => $this->faker->randomNumber(1),
            'status' => $this->faker->word(),
            'notes' => $this->faker->text(),
            'company_id' => \App\Models\Company::factory(),
            'created_by' => \App\Models\User::factory(),
        ];
    }
}
