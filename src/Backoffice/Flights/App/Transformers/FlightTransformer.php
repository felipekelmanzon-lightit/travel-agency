<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Transformers;

use Flugg\Responder\Transformers\Transformer;
use Illuminate\Support\Carbon;
use Lightit\Backoffice\Flights\Domain\Models\Flight;

class FlightTransformer extends Transformer
{
    /**
     * @return array{id: int, airlineId: int, originCityId: int, destinationCityId: int, departureDatetime: Carbon, arrivalDatetime: Carbon}
     */
    public function transform(Flight $flight): array
    {
        return [
            'id' => $flight->id,
            'airlineId' => $flight->airline_id,
            'originCityId' => $flight->origin_city_id,
            'destinationCityId' => $flight->destination_city_id,
            'departureDatetime' => $flight->departure_datetime,
            'arrivalDatetime' => $flight->arrival_datetime,
        ];
    }
}
