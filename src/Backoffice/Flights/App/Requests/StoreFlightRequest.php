<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\FlightDto;

class StoreFlightRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'airline_id' => 'required|integer|exists:airlines,id',
            'origin_city_id' => 'required|integer|exists:cities,id',
            'destination_city_id' => 'required|integer|exists:cities,id',
            'departure_datetime' => 'required|date',
            'arrival_datetime' => 'required|date|after:departure_datetime',
        ];
    }

    public function toDto(): FlightDto
    {
        return new FlightDto(
            airlineId: $this->integer('airline_id'),
            originCityId: $this->integer('origin_city_id'),
            destinationCityId: $this->integer('destination_city_id'),
            departureDate: Carbon::parse($this->string('departure_datetime')->toString()),
            arrivalDate: Carbon::parse($this->string('arrival_datetime')->toString()),
        );
    }
}
