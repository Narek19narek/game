<?php

namespace App\Http\Requests\Admin\Coins;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'coins' => 'required|numeric|min:1|max:999999',
            'price' => 'required|float|min:0.99|max:999'
        ];
    }
}
