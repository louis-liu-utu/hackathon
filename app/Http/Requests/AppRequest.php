<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppRequest extends FormRequest
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
            'name' => 'required',
            'file_name' => 'sometimes|file',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'app name is required',
            'file_name.mimes' => 'app must be apk, otherwise please input url'
        ];
    }
}
