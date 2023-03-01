<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourGroupTypeRequest extends FormRequest
{
    public function authorize()
    {
        return backpack_auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:255'
        ];
    }
}
