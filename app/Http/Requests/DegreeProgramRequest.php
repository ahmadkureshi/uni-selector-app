<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DegreeProgramRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'university_id' => 'required|exists:universities,id',
            'title' => 'required|string|max:255',
            'last_year_merit' => 'required|integer|min:0|max:1200',
            'fee' => 'required|numeric|min:0',
        ];
    }
}
