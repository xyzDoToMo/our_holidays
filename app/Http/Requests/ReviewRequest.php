<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'review.title' => 'required|string|max:100',
            'review.body' => 'required|string|max:4000',
        ];
    }
}
