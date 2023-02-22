<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:patients,email', 'max:50', 'min:5'],
            'firstName' => ['required', 'max:50'],
            'lastName' => ['required', 'max:50'],
            'details' => ['required', 'max:200'],
            'address' => ['required', 'max:50', 'min:3'],
            'contactNumber' => ['required', 'string', 'max:15', 'min:8'],
        ];
    }
}
