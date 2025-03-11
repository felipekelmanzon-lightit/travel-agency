<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\App\Requests\StoreCityRequest;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class ListCitiesAction
{
    /**
     * @return LengthAwarePaginator<City>
     */
    public function execute(StoreCityRequest $request): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<City> $paginator
         */
        $paginator = QueryBuilder::for(City::class)
            ->allowedSorts(['id', 'name'])
            ->paginate(10)
            ->appends($request->query());

        return $paginator;
    }
}
