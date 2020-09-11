<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return tru;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price' => 'required|numeric',
            'message' => 'requird|string',
            'campaign_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ];
    }
}
