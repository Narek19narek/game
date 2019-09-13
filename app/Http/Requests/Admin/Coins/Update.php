<?php

namespace App\Http\Requests\Admin\Coins;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'coins' => 'required|numeric|min:0|max:999',
            'price' => 'required|numeric|min:0|max:999'
        ];
    }
}
