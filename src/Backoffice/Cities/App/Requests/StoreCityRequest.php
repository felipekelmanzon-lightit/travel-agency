<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Cities\App\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Lightit\Backoffice\Cities\Domain\DataTransferObjects\CityDto;

class StoreCityRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'incoming_flights' => 'required|integer',
            'outgoing_flights' => 'required|integer',
        ];
    }

    public function toDto(): CityDto
    {
        return new CityDto(
            name: $this->string('name')->toString(),
            incomingFlights: $this->string('incoming_flights')->toString(),
            outgoingFlights: $this->string('outgoing_flights')->toString(),
        );
    }
}
