<?php

namespace App\Http\Requests\Seller\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'url' => 'nullable|string',
            'status' => 'required|string',
            'name' => 'required|string',
            'image' => 'required',
            'title' => 'required|string',
            'category' => 'required|string',
            'quantity' => 'required|string',
            'new_price' => 'required|string',
            'old_price' => 'required|string',
            'meta_title' => 'nullable|string',
            'description' => 'required|string',
            'youtube_link' => 'nullable|url',
            'meta_description' => 'required|string'
        ];
    }
}
