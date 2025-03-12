<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\ListCitiesDto;

class ListCitiesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sort' => 'nullable|string|in:id,name',
            'page' => 'nullable|integer|min:1',
        ];
    }

    public function toDto(): ListCitiesDto
    {
        return new ListCitiesDto(
            sort: $this->string('sort', 'id')->toString(),
            page: $this->integer('page', 1),
        );
    }
}
