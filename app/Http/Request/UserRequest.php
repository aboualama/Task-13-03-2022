<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
   
    public function rules()
    {
        switch ($this->getMethod()) {
            case 'post':
            case 'POST':

                return [
                    'name' => 'required',
                    'phone' => 'required|numeric|unique:users,phone', 
                    'email' => 'required|unique:users,email',
                    'password' => 'required|min:6|same:confirm_password', 
                ];

            case 'put':
            case 'PUT':
                return [
                    'name' => 'required',
                    'phone' => 'required|numeric|unique:users,phone,' . $this->id . '', 
                    'email' => 'required|unique:users,email,' . $this->id . '',
                    'password' => 'nullable|min:6|same:confirm_password',
                 ];
        }
    }

 
    public function authorize()
    {
        return true;
    }

    public function messages()
    { 
        $v = [
            'name.required' => __('user::dashboard.users.validation.name.required'),
            'email.required' => __('user::dashboard.users.validation.email.required'),
            'email.unique' => __('user::dashboard.users.validation.email.unique'),
            'mobile.required' => __('user::dashboard.users.validation.mobile.required'),
            'mobile.unique' => __('user::dashboard.users.validation.mobile.unique'),
            'mobile.numeric' => __('user::dashboard.users.validation.mobile.numeric'),
            'mobile.digits_between' => __('user::dashboard.users.validation.mobile.digits_between'),
            'password.required' => __('user::dashboard.users.validation.password.required'),
            'password.min' => __('user::dashboard.users.validation.password.min'),
            'password.same' => __('user::dashboard.users.validation.password.same'), 
        ];

        return $v;
    }
}
