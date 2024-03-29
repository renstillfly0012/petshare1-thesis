<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;


class DonationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'donation_name' => 'required',
            'donation_amount' => 'required|numeric','min:20',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {

            return $validator->messages()->all();
        } 
    }
}
