<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChallengeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in(['CODE', 'DESIGN', 'DATA', 'SOFT'])],
            'difficulty' => ['required', Rule::in(['EASY', 'MEDIUM', 'HARD'])],
            'rewardPoints' => ['required', 'integer', 'between:10,500'],
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after_or_equal:startDate'],
            'isActive' => ['sometimes', 'boolean'],
            'description' => ['nullable', 'string'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('isActive')) {
            $this->merge(['isActive' => filter_var($this->input('isActive'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)]);
        }
    }

    public function messages(): array
    {
        return [
            'rewardPoints.between' => 'A jutalompontoknak 10 és 500 között kell lenniük.',
            'endDate.after_or_equal' => 'A befejezés dátuma nem lehet korábbi, mint a kezdés dátuma.',
        ];
    }
}
