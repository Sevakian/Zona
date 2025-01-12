<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimestatDateRequest extends FormRequest
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
            'date' => 'required|date_format:Y-m-d H:i:s',
            'text' => 'string|max:255|nullable',
            'timestat_id' => 'exists:timestats,id|required',
        ];
    }
}
