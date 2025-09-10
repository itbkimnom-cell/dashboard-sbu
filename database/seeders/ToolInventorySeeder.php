<?php

namespace Database\Seeders;

use App\Models\ToolInventory;
use Illuminate\Database\Seeder;

class ToolInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ToolInventory::factory()
            ->count(5)
            ->create();
    }
}
