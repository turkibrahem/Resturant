<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "category_id" => "required",
            "price" => "required|numeric",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|min:1"
        ];

        foreach (config()->get("app.locales") as $key => $lang) {
            $rules[$key.".name"] = "required" ;
            $rules[$key.".description"] = "required" ;
        }

        if ($this->isMethod('post')) {
            $rules["image"] = "required" ;
        }

        return $rules ;
    }

}
