<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Lightit\Backoffice\Airlines\App\Requests\StoreAirlineRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\StoreAirlineAction;
use Symfony\Component\HttpFoundation\JsonResponse;

class StoreAirlineController
{
    public function __invoke(StoreAirlineRequest $request, StoreAirlineAction $action): JsonResponse
    {
        $airlineDto = $request->toDto();
        $airline = $action->execute($airlineDto);

        return responder()
            ->success($airline, AirlineTransformer::class)
            ->respond();
    }
}
