<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lead::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stage' => $this->faker->text(255),
            'probability' => $this->faker->randomNumber(0),
            'expected_close_date' => $this->faker->dateTime(),
            'lead_value' => $this->faker->randomNumber(1),
            'competitor' => $this->faker->text(255),
            'status' => $this->faker->word(),
            'lost_reason' => $this->faker->text(),
            'notes' => $this->faker->text(),
            'closed_at' => $this->faker->dateTime(),
            'potential_id' => \App\Models\Potential::factory(),
        ];
    }
}
