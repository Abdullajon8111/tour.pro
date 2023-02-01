<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TouragentRegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'login' => ['required', Rule::unique('users', 'login')],
            'email' => ['nullable', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'phone' => 'required',

            'description' => ['required'],
            'phone2' => ['nullable'],
            'region_id' => ['nullable'],
            'photo' => ['required']
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('имя'),
            'login' => __('логин'),
            'email' => __('email'),
            'password' => __('пароль'),
            'password_confirmation' => __('подтвердить пароль'),
            'phone' => __('телефон'),

            'description' => __('описание'),
            'phone2' => __('телефон') . ' 2',
            'region_id' => __('регион'),
            'photo' => __('фото')
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
