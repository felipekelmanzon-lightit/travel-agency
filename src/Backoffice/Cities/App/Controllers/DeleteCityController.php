<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\DeleteCityAction;
use Lightit\Backoffice\Cities\Domain\Models\City;

class DeleteCityController
{
    public function __invoke(DeleteCityAction $action, City $city): JsonResponse
    {
        $action->execute($city);

        return responder()
            ->success(CityTransformer::class)
            ->respond();
    }
}
