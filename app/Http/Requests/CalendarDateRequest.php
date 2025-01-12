<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarDateRequest extends FormRequest
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
            'date' => 'required|date_format:Y-m-d',
            'title' => 'string|max:255|nullable',
            'text' => 'string|max:255|nullable',
            'calendar_id' => 'exists:calendars,id|required',
            'calendar_usage_id' => 'exists:calendar_usages|nullable',
        ];
    }
}
