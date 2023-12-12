<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRegisterRequest extends FormRequest
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
            "name" => ["required", "max:100"],
            "description" => ["required", "max:600"],
            "author" => ["required", "max:100"],
            "categories" => ["required"],
            "purchase_price" => ['required', 'numeric'],
            "sale_price" => ['required', 'numeric'],
            "stock" => ['nullable', 'integer'],
            "images" => ['required'],
            "status" => ["nullable"]
        ];
    }
}
