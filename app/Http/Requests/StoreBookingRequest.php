<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //we should be giving the user the ability to book a property without being logged in,
        //so we should return true here,
        //if login is needed in the future we can change this to check for auth
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
            'listing_id' => 'required|exists:property_listings,id',
            'start_date' => 'required|date_format:d/m/Y|after_or_equal:today',
            'end_date' => 'required|date_format:d/m/Y|after:start_date',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'notes' => 'required'
        ];
    }
}
