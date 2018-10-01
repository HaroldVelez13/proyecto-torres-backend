<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
                'business_person'   => 'required|string|max:255',
                'principal_phone'   => 'nullable|string|max:255',
                'optional_phone'    => 'nullable|string|max:255',                
                'init_date'         => 'nullable|date',
                'finish_date'       => 'nullable|date',
                'city'              => 'nullable|string|max:255'              

                
        ];
    }
}
