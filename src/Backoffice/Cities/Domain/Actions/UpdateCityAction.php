<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Lightit\Backoffice\Cities\Domain\DataTransferObjects\CityDto;
use Lightit\Backoffice\Cities\Domain\Models\City;

class UpdateCityAction
{
    public function execute(CityDto $cityDto, City $city): City
    {
        $city->update([
            'name' => $cityDto->getName(),
            'incoming_flights' => $cityDto->getIncomingFlights(),
            'outgoing_flights' => $cityDto->getOutgoingFlights(),
        ]);

        return $city;
    }
}
