<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
class CreateEstablishmentRequest extends FormRequest
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
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @return void
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        // Здесь вы можете настроить ваш ответ в случае ошибок валидации
        $response = response()->json([
            'status' => 'error',
            'message' => 'Validation errors',
            'errors' => $validator->errors()
        ], Response::HTTP_UNPROCESSABLE_ENTITY); // 422 Unprocessable Entity

        throw new HttpResponseException($response);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'string',
            //'avatar' => 'required|image|max:5000', // Допустим максимальный размер файла 5Мб
            'address' => 'required|string|max:255', // Название местоположения
            'address_latitude' => 'required|numeric',
            'address_longitude' => 'required|numeric',
            'filters' => 'array',
            'menu' => 'array',
            'menu.*' => 'image|max:10000', // Каждый элемент массива меню должен быть изображением не более 10Мб
            'contacts' => 'array',
            'contacts.email' => 'email',
            'contacts.instagram' => 'nullable',
            'contacts.vk' => 'nullable',
            'contacts.telegram' => 'string|nullable',
            'subscription_type' => 'required',
        ];
    }
    protected function passedValidation()
    {

        if ($this->hasFile('menu')) {
            $menuPhotos = [];
            foreach ($this->file('menu') as $menuFile) {
                $menuPath = $menuFile->store('public');
                array_push($menuPhotos, Storage::url($menuPath));
            }
            $this->merge(['menu_photos' => $menuPhotos]);
        }
    }
}
