<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Models\City;

class DeleteCityController
{
    public function __invoke(City $city): JsonResponse
    {
        $city->delete();

        return responder()
            ->success(CityTransformer::class)
            ->respond();
    }
}
