<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Requests\ListAirlinesRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAirlinesAction;

class ListAirlinesController
{
    public function __invoke(ListAirlinesAction $action, ListAirlinesRequest $request): JsonResponse
    {
        $airline = $action->execute($request->toDto());
        
        return responder()
            ->success($airline, AirlineTransformer::class)
            ->respond(JsonResponse::HTTP_OK);
    }
}
