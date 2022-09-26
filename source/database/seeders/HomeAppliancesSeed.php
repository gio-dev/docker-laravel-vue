<?php

namespace Database\Seeders;

use App\Models\HomeAppliances;
use Illuminate\Database\Seeder;

class HomeAppliancesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeAppliances::factory()
            ->count(50)
            ->create();
    }
}
