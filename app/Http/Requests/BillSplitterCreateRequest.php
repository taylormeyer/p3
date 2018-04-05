<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BillSplitterCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'split_way' => 'required|numeric|min:0',
            'tab' => 'required|numeric|min:0'
        ];
    }
}
