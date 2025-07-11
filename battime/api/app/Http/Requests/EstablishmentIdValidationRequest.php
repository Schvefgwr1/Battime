<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstablishmentIdValidationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'establishment_id' => "required|integer"
        ];
    }
}
