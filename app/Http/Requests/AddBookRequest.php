<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'bookname' => 'required|max:234',
            'authorname' => 'required|max:234',
            'category'   => 'required',
            'img.*' => 'mimes:jpeg,jpg,png'
        ];
    }
}
