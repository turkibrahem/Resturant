<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{

    public function authorize()
    {
        return true; 
    }
   


    public function rules()
    {
        $rules =[
            'title' => 'required',
            'value' => 'required',
        ];

        if($this->method() == "POST")
        {
            $rules['code'] = 'required';
        }

        return $rules ;
    }
    
}
