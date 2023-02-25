<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() &&
            auth()->user()->hasRole([Role::ADMIN, Role::AGENT]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:5|max:255',
            'age_limit' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ];
    }

    public function attributes(): array
    {
        return [
            //
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
