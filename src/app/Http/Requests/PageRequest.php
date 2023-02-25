<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'url' => 'required|max:255',
            'content01' => 'max:1000',
            'image01' => 'image',
            'content02' => 'max:1000',
            'image02' => 'image',

        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
        ];
    }
}
