<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'thumbnail' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            'type_id' => 'required',
            'slug' => 'required|unique:blogs,slug,'.$this->id,
            'published_at' => 'required|date'
        ];


    }

    public function messages()
    {
        return [
            'title.required' => 'title is required',
            'slug.unique' => 'slug already exists, please re-edit',
        ];
    }
}
