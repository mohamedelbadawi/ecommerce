<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        switch ($this->method()) {

            case 'POST':
            {
                return [
                    'name' => 'required',
                    'email' => 'required|unique:admins',
                    'password' => 'required',
                    'role_id' => 'required'
                ];
            }
            case 'PATCH':
                return [
                    'name' => 'required',
                    'email' => 'required|email|unique:admins,email,'.$this->admin->id,
                    'role_id' => 'required'
                ];


        }
    }

}
