<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\ListCitiesAction;

class ListCitiesController
{
    public function __invoke(ListCitiesAction $action): JsonResponse
    {
        return responder()
            ->success([
                'message' => 'List of cities',
                'data' => $action->execute(),
                CityTransformer::class,
            ])
            ->respond();
    }
}
