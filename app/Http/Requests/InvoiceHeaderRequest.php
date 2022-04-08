<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceHeaderRequest extends FormRequest
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
            "invoice_number" => "required|min:8",
            "invoice_date" => "required",
            "address" => "required",
            "sold_to" => "required",
            "amount_paid" => "required",
            "total" => "required"

        ];
    }
}
