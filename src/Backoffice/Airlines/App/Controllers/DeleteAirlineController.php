<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Airlines\App\Transformers\AirlineTransformer;
use Lightit\Backoffice\Airlines\Domain\Actions\DeleteAirlineAction;
use Lightit\Backoffice\Airlines\Domain\Models\Airline;

class DeleteAirlineController
{
    public function __invoke(DeleteAirlineAction $action, Airline $airline): JsonResponse
    {
        $action->execute($airline);

        return responder()
            ->success(AirlineTransformer::class)
            ->respond();
    }
}
