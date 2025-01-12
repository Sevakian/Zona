<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimestatRequest extends FormRequest
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
            'name' => 'required|string|unique:timestats|max:255',
        ];
    }
}
