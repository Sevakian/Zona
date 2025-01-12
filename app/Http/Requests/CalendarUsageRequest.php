<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarUsageRequest extends FormRequest
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
            'name' => 'string|required|unique:calendar_usages|max:255',
            'color' => 'string|nullable|max:15',
        ];
    }
}
