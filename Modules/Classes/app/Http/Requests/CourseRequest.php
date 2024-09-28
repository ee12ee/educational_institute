<?php

namespace Modules\Classes\Http\Requests;

use App\Enums\CourseStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:2|max:50|unique:courses,name',
            'description'=>'required|string|min:50|max:255|',
            'status'=>'required'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasPermissionTo('manage courses','admin');
    }
}
