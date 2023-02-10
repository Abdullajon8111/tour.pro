<?php

namespace Modules\Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tour_id' => ['required', Rule::exists('tours', 'id')],
            'context' => ['required'],
            'rating' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return auth()->check();
    }
}
