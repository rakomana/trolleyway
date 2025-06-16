<?php

namespace App\Http\Requests\Generic\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'image' => 'required|file|mimes:jpg,jpeg,png,bmp,tiff |max:4096',
            'title' => 'required|string',
            'author' => 'required|string',
            'description_1' => 'required',
            'description_2' => 'required',
        ];
    }
}
