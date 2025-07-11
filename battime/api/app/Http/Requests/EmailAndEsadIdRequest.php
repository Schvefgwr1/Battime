<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailAndEsadIdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:admin_establishments,email',
            'establishment_id' => 'required|exists:registered_establishments,id',
        ];
    }
}
