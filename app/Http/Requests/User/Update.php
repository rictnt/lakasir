<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class Update extends FormRequest
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
            'username' => ['required', 'string', 'regex:/^\S*$/u', 'max:255', 'unique:users,id,' . auth()->user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,'. auth()->user()->id],
            'password' => ['confirmed'],
            'role' => ['required']
        ];
    }
}
