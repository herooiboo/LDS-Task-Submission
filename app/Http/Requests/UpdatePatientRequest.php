<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
                'email' => ['required', 'email', 'unique:patients,email,' . $this->email, 'max:50', 'min:5'],
                'firstName' => ['required', 'max:50'],
                'lastName' => ['required', 'max:50'],
                'details' => ['required', 'max:200'],
                'address' => ['required', 'max:50', 'min:3'],
                'contactNumber' => ['required', 'string', 'max:15', 'min:8'],
            ];
        return [
            'email' => ['sometimes', 'nullable', 'email', 'unique:patients,email,' . $this->email, 'max:50', 'min:5'],
            'firstName' => ['sometimes', 'nullable', 'max:50'],
            'lastName' => ['sometimes', 'nullable', 'max:50'],
            'details' => ['sometimes', 'nullable', 'max:200'],
            'address' => ['sometimes', 'nullable', 'max:50', 'min:3'],
            'contactNumber' => ['sometimes', 'nullable', 'string', 'max:15', 'min:8'],
        ];
    }
}
