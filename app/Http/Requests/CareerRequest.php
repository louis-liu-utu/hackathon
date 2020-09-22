<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CareerRequest extends FormRequest
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
            'title' => 'required|string',
            'lb_content' => 'required',
            'slug' => 'required|unique:careers,slug,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required',
            'slug.unique' => 'slug already exists, please re-edit',
            'lb_content.required' => 'content is required'
        ];
    }

}
