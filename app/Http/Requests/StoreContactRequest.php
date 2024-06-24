<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //you shouldn't need to be logged in to contact us, so we should return true here
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
            //all fields are required, maximum of 255 characters on all fields except message
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required'
        ];
    }
}
