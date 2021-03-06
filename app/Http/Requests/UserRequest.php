<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.max' => __('validation.max.numeric'),
            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),
            'password.required' => __('validation.required'),
            'password.confirmed' => __('validation.confirmed'),
            'password.min' => __('validation.min.numeric'),
        ];
    }
}
