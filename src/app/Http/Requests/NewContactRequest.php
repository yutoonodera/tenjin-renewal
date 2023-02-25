<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewContactRequest extends FormRequest
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
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'email' => 'required|email|max:255',
            'content' => 'required|max:255',

        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'name' => 'お名前',
            'company' => '会社名',
            'content' => '内容',
        ];
    }
}
