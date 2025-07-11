<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsValidationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'Sms_User_Sent' => 'required|digits:6',
        ];
    }
}
