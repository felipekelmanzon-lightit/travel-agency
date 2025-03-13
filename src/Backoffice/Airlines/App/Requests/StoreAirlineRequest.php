<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Airlines\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Airlines\Domain\DataTransferObjects\AirlineDto;

class StoreAirlineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ];
    }

    public function toDto(): AirlineDto
    {
        return new AirlineDto(
            name: $this->string('name')->toString(),
            description: $this->string('description')->toString(),
        );
    }
}
