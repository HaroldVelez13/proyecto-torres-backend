<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ToolCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'barcode'       => 'required|integer|unique:tools',
            'total'         => 'nullable|integer',
            'state'         => 'required|string|max:255',
            'type'          => 'required|string|max:255',
            'category_id'   => 'required|integer',
        ];
    }
}
