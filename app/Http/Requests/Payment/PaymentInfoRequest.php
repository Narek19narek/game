<?php

namespace App\Http\Requests\Payment;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class PaymentInfoRequest extends FormRequest
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
        $statuses = implode(',', array_values(Transaction::getStatuses()));
        $types    = implode(',', array_values(Transaction::getTypes()));

        return [
            'coin'   => 'required|integer|exists:coins,id',
            'status' => 'required|integer|in:' . $statuses,
            'type'   => 'required|integer|in:' . $types,
        ];
    }
}
