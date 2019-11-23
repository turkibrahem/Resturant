<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;
use \App\Constants\UserTypes as UserTypes;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'min:8|max:100|confirmed',
            'current_password' => 'required'
        ];
    }

}
