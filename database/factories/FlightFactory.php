<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;
use Carbon\Carbon;

/**
 * @extends Factory<Flight>
 */
class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition(): array
    {
        /** @var Airline $airline */
        $airline = Airline::query()->inRandomOrder()->first() ?? (new AirlineFactory())->create();
        $airlineId = $airline->id;
        /** @var City $originCity */
        $originCity = City::query()->inRandomOrder()->first() ?? (new CityFactory())->create();
        /** @var City $destinationCity */
        $destinationCity = City::query()
                                ->where('id', '!=', $originCity->id)
                                ->inRandomOrder()
                                ->first() ?? (new CityFactory())->create();
        $departure = Carbon::parse(fake()->dateTimeBetween('now', '+1 year'));
        $arrival = $departure->copy()->addHours(fake()->numberBetween(1, 15));

        return [
            'airline_id' => $airlineId,
            'origin_city_id' => $originCity->id,
            'destination_city_id' => $destinationCity->id,
            'departure_datetime' => $departure->format('Y-m-d H:i:s'),
            'arrival_datetime' => $arrival->format('Y-m-d H:i:s'),
        ];
    }
}
