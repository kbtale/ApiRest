<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Customer;

class PosCheckoutRequest extends FormRequest
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
        $rules = [
            'customer_id' => 'required',
            'items' => 'required',
            'discount_rate' => 'required',
            'discount_amount' => 'required',
            'tax_amount' => 'required',
            'tax' => 'required',
            'profit_after_all' => 'required',
            'payable_after_all' => 'required',
            'payment_note' => 'sometimes',
            'staff_note' => 'sometimes',
        ];
    
        // Retrieve the customer from the database using the id from the request
        $customer = Customer::find($this->input('customer_id'));
    
        // If the customer is not a partner, add the payment_method_id rule
        if ($customer && !$customer->partner) {
            $rules['payment_method_id'] = 'required';
        }
    
        return $rules;
    }
}
