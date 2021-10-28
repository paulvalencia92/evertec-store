<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'id' => ['nullable'],
            'name' => ['required'],
            'price' => ['required'],
            'file' => ['required_without:id', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }

    public function messages()
    {

        return [
            'file.required_without' => 'File is required',
        ];
    }
}
