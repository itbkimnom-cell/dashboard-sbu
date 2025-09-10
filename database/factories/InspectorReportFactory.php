<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\InspectorReport;
use Illuminate\Database\Eloquent\Factories\Factory;

class InspectorReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InspectorReport::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'inspection_date' => $this->faker->dateTime(),
            'file_report' => $this->faker->text(255),
            'file_report_date' => $this->faker->dateTime(),
            'file_bast' => $this->faker->text(255),
            'file_bast_date' => $this->faker->dateTime(),
            'inspector_user_id' => \App\Models\User::factory(),
            'administration_user_id' => \App\Models\User::factory(),
        ];
    }
}
