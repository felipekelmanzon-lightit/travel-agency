<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Cities\App\Requests\StoreCityRequest;
use Lightit\Backoffice\Cities\App\Transformers\CityTransformer;
use Lightit\Backoffice\Cities\Domain\Actions\UpdateCityAction;
use Lightit\Backoffice\Cities\Domain\Models\City;

class UpdateCityController
{
    public function __invoke(StoreCityRequest $request, UpdateCityAction $action, City $city): JsonResponse
    {
        $updatedCity = $action->execute($request->toDto(), $city);

        return responder()
            ->success([
                'message' => 'City updated',
                'data' => $updatedCity,
                CityTransformer::class,
            ])
            ->respond();
    }
}
