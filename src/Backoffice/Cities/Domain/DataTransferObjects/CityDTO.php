<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\DataTransferObjects;

class CityDto
{
    public function __construct(
        private readonly string $name,
        private readonly string $incomingFlights,
        private readonly string $outgoingFlights,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIncomingFlights(): string
    {
        return $this->incomingFlights;
    }

    public function getOutgoingFlights(): string
    {
        return $this->outgoingFlights;
    }
}
