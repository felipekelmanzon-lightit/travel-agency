<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\Models\City;

class ListCitiesAction
{
    /**
     * @return LengthAwarePaginator<City>
     */
    public function execute(string $sortBy = 'id'): LengthAwarePaginator
    {
        return City::orderBy($sortBy)->paginate(10);
    }
}
