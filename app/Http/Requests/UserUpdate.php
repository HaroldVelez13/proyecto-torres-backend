<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdate extends FormRequest
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
                'name'          => 'required|string|max:255',
                'last_name'     => 'nullable|string|max:255',
                'email'         => 'required|string|email|max:255',
                'cc'            => 'required|integer|max:999999999999999',
                'init_at'       => 'nullable|date',
                'finish_at'     => 'nullable|date',            
                'address'       => 'nullable|string|max:255',
                'phone'         => 'nullable|string|max:255',
                'cell'          => 'nullable|string|max:255',
                'uniform_size'  => 'required|string|max:2',
                'shoe_size'     => 'required|integer|max:50',                
                'img_url'       => 'nullable|string',//expresion for base64
                'birthday'      => 'required|date',
                'ep_id'            => 'nullable|integer',
                'pension_id'       => 'nullable|integer',
                'gender'        => 'required|string|max:2',
        ];
    }
}
