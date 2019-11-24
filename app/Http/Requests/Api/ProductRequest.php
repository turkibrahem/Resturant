<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            "category_id" => "required",
            "price" => "required|numeric",
            // "en.name" => "required|numeric",
            // "ar.name" => "required|numeric",
            // "en.description" => "required|numeric",
            // "ar.description" => "required|numeric",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|min:1"
        ];

        
        if ($this->isMethod('post')) {
            $rules["image"] = "required" ;
        }
        // dd($rules);

        return $rules ;
    }

}


// {
//     "price":"300" ,
//     "category_id":"1"     ,
//     "en[name]":"haaa"     ,
//     "ar[name]":"aaaaa"     ,
//     "en[description]":"aaaaa",     
//     "ar[description]":"1ssssssss"     
//   }
