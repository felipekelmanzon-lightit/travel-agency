<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class ListAirlinesAction
{
    /**
     * Execute the action to list airlines with optional filtering by active flights.
     *
     * @param int|null $activeFlights The number of active flights to filter by.
     *
     * @return LengthAwarePaginator <Airline>
     */
    public function execute(int|null $activeFlights = null): LengthAwarePaginator
    {
        $query = Airline::query();
        if ($activeFlights !== null) {
            $query->where('number_of_flights', $activeFlights);
        }

        return $query->paginate(10);
    }
}
