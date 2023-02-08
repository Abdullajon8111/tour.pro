<?php

namespace Modules\Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppealStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'tour_id' => ['required', Rule::exists('tours', 'id')]
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
