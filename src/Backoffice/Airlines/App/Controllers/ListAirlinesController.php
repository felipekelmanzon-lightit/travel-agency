<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Requests\StoreAirlineRequest;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\ListAirlinesAction;

class ListAirlinesController
{
    public function __invoke(ListAirlinesAction $action, StoreAirlineRequest $request): JsonResponse
    {
        $activeFlights = is_null($request->query('active_flights')) ? null : (int) $request->query('active_flights');

        return responder()
            ->success($action->execute($activeFlights), AirlineTransformer::class)
            ->respond();
    }
}
