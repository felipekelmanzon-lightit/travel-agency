<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

use Carbon\Carbon;

class FlightDto
{
    public function __construct(
        private readonly int $airlineId,
        private readonly int $originCityId,
        private readonly int $destinationCityId,
        private readonly Carbon $departureDate,
        private readonly Carbon $arrivalDate,
    ) {
    }

    public function getAirlineId(): int
    {
        return $this->airlineId;
    }
    
    public function getOriginCityId(): int
    {
        return $this->originCityId;
    }

    public function getDestinationCityId(): int
    {
        return $this->destinationCityId;
    }
    
    public function getDepartureDate(): Carbon
    {
        return $this->departureDate;
    }

    public function getArrivalDate(): Carbon
    {
        return $this->arrivalDate;
    }
}
