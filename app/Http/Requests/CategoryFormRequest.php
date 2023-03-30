<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:200'
            ],
            'slug' => [
                'required',
                'string',
                'max:200'
            ],
            'description' => [
                'required',
            ],
            'image' => [
                'nullable',
                'image:jpeg,jpg,png'
            ],
            'mate_title' => [
                'required',
                'string',
                'max:200'
            ],
            'mate_description' => [
                'required',
                'string',
            ],
            'mate_keyword' => [
                'required',
                'string',
            ],
            'navbar_status' => [
                'nullable'
            ],
            'status' => [
                'nullable'
            ]
        ];
    }
}
