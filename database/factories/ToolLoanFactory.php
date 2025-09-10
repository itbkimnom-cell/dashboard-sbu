<?php

namespace Database\Factories;

use App\Models\ToolLoan;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToolLoanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ToolLoan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_loan_date' => $this->faker->dateTime(),
            'end_loan_date' => $this->faker->dateTime(),
            'return_date' => $this->faker->dateTime(),
            'quantity' => $this->faker->randomNumber(),
            'condition_out' => $this->faker->text(255),
            'condition_in' => $this->faker->text(255),
            'status' => $this->faker->word(),
            'notes' => $this->faker->text(),
            'tool_inventory_id' => \App\Models\ToolInventory::factory(),
            'borrowed_by' => \App\Models\User::factory(),
            'approved_returned_by' => \App\Models\User::factory(),
            'approved_borrowed_by' => \App\Models\User::factory(),
        ];
    }
}
