<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyUpdateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('companies', 'name')->ignore($this->company->id)],
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpg,png|dimensions:min_width=100,min_height=100',
            'address' => 'nullable|string',
            'coordinates' => 'nullable|string|regex:/^-?\d+\.\d+,\s-?\d+\.\d+$/'
        ];
    }
}
