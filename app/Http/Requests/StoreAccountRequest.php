<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'nationalid' => 'required|regex:/^\d{2}-\d{7}[a-zA-Z]\d{2}$/',
            'dateofbirth' => 'required|date|before:today,',
            'phonenumber' => 'required|numeric|digits_between:8,13',
            'gender' => 'required',
            'image' => 'required|image|mimes:jpg, jpeg, png',
            'proofofresidency' => 'required|mimes:pdf',
            'proofofincome' => 'required|mimes:pdf',
            'photo' => 'required|image|mimes:jpg, jpeg, png'
        ];
    }
}
