<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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
            'series' => 'string|max:255|nullable',
            'genre' => 'string|max:255|nullable',
            'release_date' => 'date_format:Y-m-d|nullable',
            'developer' => 'string|max:255|nullable',
            'dimension' => 'string|max:255|nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'string|max:255|nullable',
            'size' => 'string|max:255|nullable',
            'sold_amount' => 'integer|nullable',
            'text' => 'string|max:255|nullable',
            'consoles' => 'array|exists:consoles,id',
            // 'consoles.*' => 'uuid',
        ];
    }
}
