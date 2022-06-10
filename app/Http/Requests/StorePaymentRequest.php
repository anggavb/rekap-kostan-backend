<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'payment_method' => 'required|in:cash,transfer',
            'payment_status' => 'required|boolean',
            'proof_of_payment' => 'string|max:255',
            'amount' => 'required|numeric',
            'occupant_id' => 'required|integer|exists:occupants,id',
            'created_at' => 'date',
        ];
    }
}
