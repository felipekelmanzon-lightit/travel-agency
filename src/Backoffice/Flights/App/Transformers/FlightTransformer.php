<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Carbon;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, airline_id: int, origin_city_id: int, destination_city_id: int, departure_datetime: Carbon, arrival_datetime: Carbon}
     */
    public function transform(Flight $flight): array
    {
        return [
            'id' => $flight->id,
            'airline_id' => $flight->airline_id,
            'origin_city_id' => $flight->origin_city_id,
            'destination_city_id' => $flight->destination_city_id,
            'departure_datetime' => $flight->departure_datetime,
            'arrival_datetime' => $flight->arrival_datetime,
        ];
    }
}
