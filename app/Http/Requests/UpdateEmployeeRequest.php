<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    protected function prepareForValidation()
    {
        if ($this->firstName)
            $this->merge([
                'first_name' => $this->firstName,
            ]);
        if ($this->lastName)
            $this->merge([
                'last_name' => $this->lastName,
            ]);
        if ($this->contactNumber)
            $this->merge([
                'contact_number' => $this->contactNumber,
            ]);
    }
    public function rules()
    {
        $method = $this->method();
        if ($method == 'PUT')
            return [
                'email' => ['required', 'email', 'unique:employees,email,' . $this->email, 'max:50', 'min:5'],
                'first_name' => ['required', 'max:50'],
                'last_name' => ['required', 'max:50'],
                'address' => ['required', 'max:50', 'min:3'],
                'contact_number' => ['required', 'string', 'max:15', 'min:8'],

            ];
        return [
            'email' => ['sometimes', 'nullable', 'email', 'unique:employees,email,' . $this->email, 'max:50', 'min:5'],
            'first_name' => ['sometimes', 'nullable', 'max:50'],
            'last_name' => ['sometimes', 'nullable', 'max:50'],
            'address' => ['sometimes', 'nullable', 'max:50', 'min:3'],
            'contact_number' => ['sometimes', 'nullable', 'string', 'max:15', 'min:8'],
        ];
    }
}
