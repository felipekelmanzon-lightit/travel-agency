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
            'airlineId' => 'required|integer|exists:airlines,id',
            'originCityId' => 'required|integer|exists:cities,id',
            'destinationCityId' => 'required|integer|exists:cities,id|different:originCityId',
            'departureDatetime' => 'required|date',
            'arrivalDatetime' => 'required|date|after:departureDatetime',
        ];
    }

    public function toDto(): FlightDto
    {
        return new FlightDto(
            airlineId: $this->integer('airlineId'),
            originCityId: $this->integer('originCityId'),
            destinationCityId: $this->integer('destinationCityId'),
            departureDate: Carbon::parse($this->string('departureDatetime')->toString()),
            arrivalDate: Carbon::parse($this->string('arrivalDatetime')->toString()),
        );
    }
}
