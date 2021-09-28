<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UrlRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'original_url' => 'required|url',
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'original_url.required' => 'La URL original, es obligatoria',
            'original_url.url' => 'La URL original, debe ser una URL válida'
        ];
    }
}
