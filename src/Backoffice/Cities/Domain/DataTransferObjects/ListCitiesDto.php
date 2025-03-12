<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\DataTransferObjects;

class ListCitiesDto
{
    public function __construct(
        private readonly string $sort,
        private readonly int $page,
    ) {
    }

    public function getSort(): string
    {
        return $this->sort;
    }

    public function getPage(): int
    {
        return $this->page;
    }
}
