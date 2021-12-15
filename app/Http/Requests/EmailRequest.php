<?php

namespace App\Http\Requests;

use App\Rules\MatchPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email_password' => ['required', 'string', new MatchPasswordRule],
        ];
    }
}
