<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
        $rules = [
            "phone" => "required|numeric",
            "address" => "required",
            "lat" => "required|numeric",
            "long" => "required|numeric",
            "total_price" => "required|numeric",
            "products" => "required"
        ];

        return $rules ;
    }

}
