<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateStudentRequest extends Request
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
            'student_number' => 'required',
            'fname'          => 'required',
            'lname'          => 'required',
            'address'        => 'required',
            'zip'            => 'required',
            'city'           => 'required',
            'state'          => 'required',
            'phone'          => 'required',
            'mobile'         => 'required',
            'email'          => 'required|email',
            'year'           => 'required|numeric',
            'section_id'     => 'required',
            'dob'            => 'required',
        ];
    }
}
