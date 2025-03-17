<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserFactory::new()->count(10)->create();

        $this->call(CitySeeder::class);

        $this->call(AirlineSeeder::class);

        $this->call(FlightSeeder::class);

    }
}
