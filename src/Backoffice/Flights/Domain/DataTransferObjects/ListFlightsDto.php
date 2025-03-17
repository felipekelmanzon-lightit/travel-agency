<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\DataTransferObjects;

class ListFlightsDto
{
    public function __construct(
        private readonly string $sort,
        private readonly string $filter,
        private readonly int $page,
    ) {
    }

    public function getSort(): string
    {
        return $this->sort;
    }

    public function getFilter(): string
    {
        return $this->filter;
    }

    public function getPage(): int
    {
        return $this->page;
    }
}
