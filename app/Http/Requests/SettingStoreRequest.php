<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingStoreRequest extends FormRequest
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
            'key' => ['required', 'unique:settings', 'max:255', 'string'],
            'value' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'file', 'max:2000', 'mimes:jpg,jpeg,png'],
        ];
    }
}
