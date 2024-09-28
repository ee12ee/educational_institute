<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name'=>'required|alpha|min:2|max:50',
            'last_name'=>'required|alpha|min:2|max:50',
            'street'=>'required|string',
            'city'=>'required|string',
            'phone'=>'required|regex:/^09\d{8}$/|unique:students,phone',
            'email'=>'required|email|unique:students,email',
            'password'=>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
