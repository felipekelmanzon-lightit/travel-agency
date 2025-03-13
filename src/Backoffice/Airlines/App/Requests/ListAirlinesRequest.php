<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\ListAirlinesDto;

class ListAirlinesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'sort' => 'nullable|string|in:id,name',
            'page' => 'nullable|integer|min:1',
        ];
    }

    public function toDto(): ListAirlinesDto
    {
        return new ListAirlinesDto(
            sort: $this->string('sort', 'id')->toString(),
            page: $this->integer('page', 1),
        );
    }
}
