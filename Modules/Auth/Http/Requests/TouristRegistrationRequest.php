<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TouristRegistrationRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required',
            'login' => ['required', Rule::unique('users', 'login')],
            'surname' => 'nullable',
            'email' => ['nullable', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'phone' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('имя'),
            'login' => __('логин'),
            'surname' => __('фамилия'),
            'email' => __('email'),
            'password' => __('пароль'),
            'password_confirmation' => __('подтвердить пароль'),
            'phone' => __('телефон')
        ];
    }

    public function authorize()
    {
        return true;
    }
}
