<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
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
            'shop_document' => 'required|file|mimes:pdf,doc,docx|max:10000',
            'shop_logo' => 'required|file|mimes:jpg,jpeg,png,bmp,tiff |max:4096',
            'shop_email' => 'required|email|unique:shops',
            'company_reg' => 'required|string',
            'shop_category' => 'required|string',
            'status' => 'nullable|string|max:255',
            'shop_name' => 'required|string|max:255',
            'shop_description' => 'required|string',
            'shop_phone_number' => 'required|unique:shops',
        ];
    }
}
