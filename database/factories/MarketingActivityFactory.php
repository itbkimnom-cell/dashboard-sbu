<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\MarketingActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

class MarketingActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MarketingActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_type' => $this->faker->text(255),
            'activity_date' => $this->faker->dateTime(),
            'notes' => $this->faker->text(),
            'created_by' => \App\Models\User::factory(),
            'lead_id' => \App\Models\Lead::factory(),
        ];
    }
}
