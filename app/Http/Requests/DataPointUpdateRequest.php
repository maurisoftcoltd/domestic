<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataPointUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'town_id' => ['required', 'integer', 'exists:towns,id'],
            'reportedCases' => ['required', 'integer'],
            'activeStatus' => ['required'],
        ];
    }
}
