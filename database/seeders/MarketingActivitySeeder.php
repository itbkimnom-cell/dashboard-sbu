<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MarketingActivity;

class MarketingActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MarketingActivity::factory()
            ->count(5)
            ->create();
    }
}
