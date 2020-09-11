<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'name' => 'required|max:255|min:10',
            'content' => 'required',
            'date_end' => 'required|after:'.Date('Y-m-d'),
            'amount' => 'required|numeric',
            'user_id' => 'required',
            'category_id' => 'required',
            'description' => 'required|max:500',
        ];
    }
}
