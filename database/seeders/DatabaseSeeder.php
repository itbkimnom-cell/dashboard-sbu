<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(UserSeeder::class);
        $this->call(PermissionsSeeder::class);

        // $this->call(CompanySeeder::class);
        // $this->call(InspectorReportSeeder::class);
        // $this->call(LeadSeeder::class);
        // $this->call(MarketingActivitySeeder::class);
        // $this->call(PotentialSeeder::class);
        // $this->call(ToolCategorySeeder::class);
        // $this->call(ToolInventorySeeder::class);
        // $this->call(ToolLoanSeeder::class);
    }
}
