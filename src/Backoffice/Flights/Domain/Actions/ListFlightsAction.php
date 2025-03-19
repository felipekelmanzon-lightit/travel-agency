<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\ListFlightsDto;
use Lightit\Backoffice\Flights\Domain\Models\Flight;
use Spatie\QueryBuilder\QueryBuilder;

class ListFlightsAction
{
    /**
     * @return LengthAwarePaginator<Flight>
     */
    public function execute(ListFlightsDto $dto): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator<Flight> $paginator */
        $paginator = QueryBuilder::for(Flight::class)
            ->allowedFilters(['airline_id', 'origin_city_id', 'destination_city_id'])
            ->paginate(10, ['*'], 'page', $dto->getPage());

        return $paginator;
    }
}
