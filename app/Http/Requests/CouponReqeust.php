<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponReqeust extends FormRequest
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
                    'code' => 'required|unique:coupons',
                    'status' => 'required',
                    'type' => 'in:percentage,fixed',
                    'description' => 'nullable',
                    'use_times' => 'required',
                    'start_date' => 'date',
                    'expire_date' => 'date',
                    'min_total' => 'numeric',
                    'value' => 'numeric',

                ];
            }
            case 'PATCH':
            {
                return [
                    'code' => 'required|unique:coupons,code,'. $this->route()->coupon->id,
                    'status' => 'required',
                    'type' => 'in:percentage,fixed',
                    'description' => 'nullable',
                    'use_times' => 'required',
                    'start_date' => 'date',
                    'expire_date' => 'date',
                    'min_total' => 'numeric|nullable',
                    'value' => 'numeric',

                ];
            }
        }


    }
}
