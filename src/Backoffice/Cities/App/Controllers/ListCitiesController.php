<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Requests\ListCitiesRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\ListCitiesAction;

class ListCitiesController
{
    public function __invoke(ListCitiesAction $action, ListCitiesRequest $request): JsonResponse
    {
        $city = $action->execute($request->toDto());

        return responder()
            ->success($city, CityTransformer::class)
            ->respond(JsonResponse::HTTP_OK);
    }
}
