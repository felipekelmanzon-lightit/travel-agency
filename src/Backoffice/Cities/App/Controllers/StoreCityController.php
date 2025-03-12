<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Lightit\Backoffice\Cities\App\Requests\StoreCityRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\StoreCityAction;
use Symfony\Component\HttpFoundation\JsonResponse;

class StoreCityController
{
    public function __invoke(StoreCityRequest $request, StoreCityAction $action): JsonResponse
    {
        $city = $action->execute($request->toDto());

        return responder()
            ->success($city, CityTransformer::class)
            ->respond(JsonResponse::HTTP_CREATED);
    }
}
