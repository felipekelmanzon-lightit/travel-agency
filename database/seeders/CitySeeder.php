<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\CityFactory;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        CityFactory::new()->count(15)->create();
    }
}
