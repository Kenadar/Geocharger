<?php

namespace App\Http\Requests;

use App\Models\Geodata;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GeodataUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'address' => ['string'],
        ];
    }
}