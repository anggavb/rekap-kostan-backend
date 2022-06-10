<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOccupantRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'total_occupant' => 'integer|min:1',
            'charge' => 'required|numeric|min:0',
            'pay_date' => 'required|date',
            'room_id' => 'required|integer|exists:rooms,id',
            'is_active' => 'boolean',
        ];
    }
}
