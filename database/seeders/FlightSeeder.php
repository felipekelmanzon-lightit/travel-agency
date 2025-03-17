<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\FlightFactory;

class FlightSeeder extends Seeder
{
    public function run(): void
    {
        FlightFactory::new()->count(10)->create();
    }
}
