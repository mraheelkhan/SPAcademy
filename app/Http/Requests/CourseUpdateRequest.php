<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Course;
use Illuminate\Validation\Rule;
class CourseUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'code' => ['required', 'min:2', 'max:5', Rule::unique("courses")->ignore($this->code)]
            // 'code' => ['required', 'min:2', 'max:5'],
            'grade_id' => 'required',
            'name' => ['required', 'min:3', 'max:150'],
            'fee' => ['required', 'numeric']
        ];
    }
}
