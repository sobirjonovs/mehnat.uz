<?php

namespace Database\Seeders;

use App\Models\Employer\Employer;
use App\Models\Organization\Organization;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Organization::factory()->afterCreating(function (Organization $organization) {
            Employer::factory()->afterMaking(function (Employer $employer) use ($organization) {
                $employer->organization_id = $organization->id;
            })->make()->save();
        })->create();
    }
}
