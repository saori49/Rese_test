<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'selectDate' => 'required',
            'selectTime' => 'required',
            'selectNumber' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'selectDate.required' => '※日付を選択してください',
            'selectTime.required' => '※時間を選択してください',
            'selectNumber.required' => '※人数を選択してください',
        ];
    }
}
