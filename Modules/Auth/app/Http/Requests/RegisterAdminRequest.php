<?php

namespace Modules\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        
            return [
                'first_name'=>'required|alpha|min:2|max:50',
                'last_name'=>'required|alpha|min:2|max:50',
                'username'=>'required|string|min:2|max:50|unique:admins,username',
                'phone'=>'required|regex:/^09\d{8}$/|unique:admins,phone',
                'email'=>'required|email|unique:admins,email',
                'password'=>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ];
        
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo('add admins','admin');
    }
}
