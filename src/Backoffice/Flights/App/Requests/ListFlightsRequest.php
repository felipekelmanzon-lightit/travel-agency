<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Flights\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Flights\Domain\DataTransferObjects\ListFlightsDto;

class ListFlightsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sort' => 'nullable|string|in:id,name',
            'filter' => 'nullable|string',
            'page' => 'nullable|integer|min:1',
        ];
    }

    public function toDto(): ListFlightsDto
    {
        return new ListFlightsDto(
            sort: $this->string('sort', 'id')->toString(),
            filter: $this->string('filter')->toString(),
            page: $this->integer('page', 1),
        );
    }
}
