<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            "nickname" => ['required', 'max:100', 'unique:users,nickname'],
            "name" => ['required', 'max:100'],
            "lastname" => ['required', 'max:100'],
            "gender" => ['required', 'integer'],
            "birthdate" => ['required', 'date'],
            "document_type" => ['required', 'integer'],
            "document_number" => ['required', 'string'],
            "phone" => ['required', 'max:255'],
            "status" => ['nullable'],
            "role_id" => ['required', 'exists:roles,id'],
            "email" => ['required', 'email', 'max:255', 'unique:users,email'],
            "password" => ['required', 'max:255']
        ];
    }
}
