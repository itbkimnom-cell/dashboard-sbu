<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ToolInventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToolInventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ToolInventory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'purchase_date' => $this->faker->dateTime(),
            'purchase_price' => $this->faker->randomNumber(1),
            'location_store' => $this->faker->text(255),
            'quantity' => $this->faker->randomNumber(),
            'status' => $this->faker->word(),
            'picture' => $this->faker->text(255),
            'notes' => $this->faker->text(),
            'tool_category_id' => \App\Models\ToolCategory::factory(),
            'created_by' => \App\Models\User::factory(),
        ];
    }
}
