<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsoleRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'developer' => 'string|max:255|nullable',
            'release_date' => 'date_format:Y-m-d|nullable',
            'generation' => 'string|max:255|nullable',
            'status' => 'string|max:255|nullable',
            'type' => 'string|max:255|nullable',
            'sold_amount' => 'integer|nullable',
            'text' => 'string|max:255|nullable',
            'games' => 'array|exists:games,id',
            // 'games.*' => 'uuid'
        ];
    }
}
