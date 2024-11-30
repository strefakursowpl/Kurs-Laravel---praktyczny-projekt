<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|unique:books|max:255',
            'author' => 'required|max:255',
        ];
    }
    
    // public function messages(): array {
    //     return [
    //         'title.required' => 'Pole jest wymagane',
    //         'title.unique' => 'Pole musi być unikalne',
    //     ];
    // }
}
