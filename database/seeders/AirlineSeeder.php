<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\AirlineFactory;

class AirlineSeeder extends Seeder
{
    public function run(): void
    {
        AirlineFactory::new()->count(10)->create();
    }
}
