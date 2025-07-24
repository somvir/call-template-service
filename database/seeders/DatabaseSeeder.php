<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CallTemplate;
use App\Models\Company; 
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Company::factory(5)->create()->each(function ($company) {
            User::factory(3)->create(['company_id' => $company->id]);
            CallTemplate::factory(2)->create(['company_id' => $company->id]);
        });
    }
}
