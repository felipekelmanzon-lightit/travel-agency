<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\Domain\Actions;

use Illuminate\Pagination\LengthAwarePaginator;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\ListCitiesDto;
use Lightit\Backoffice\Cities\Domain\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class ListCitiesAction
{
    /**
     * @return LengthAwarePaginator<City>
     */
    public function execute(ListCitiesDto $dto): LengthAwarePaginator
    {
        /**
         * @var LengthAwarePaginator<City> $paginator
         */
        $paginator = QueryBuilder::for(City::class)
            ->allowedSorts(['id', 'name'])
            ->orderBy($dto->getSort())
            ->paginate(10, ['*'], 'page', $dto->getPage());

        return $paginator;
    }
}
