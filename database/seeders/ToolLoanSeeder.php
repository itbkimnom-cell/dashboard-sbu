<?php

namespace Database\Seeders;

use App\Models\ToolLoan;
use Illuminate\Database\Seeder;

class ToolLoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ToolLoan::factory()
            ->count(5)
            ->create();
    }
}
