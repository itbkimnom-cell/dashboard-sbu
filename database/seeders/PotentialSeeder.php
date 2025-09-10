<?php

namespace Database\Seeders;

use App\Models\Potential;
use Illuminate\Database\Seeder;

class PotentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Potential::factory()
            ->count(5)
            ->create();
    }
}
