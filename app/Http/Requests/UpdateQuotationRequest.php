<?php

namespace App\Http\Requests;

use App\Models\Quotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quotation_edit');
    }

    public function rules()
    {
        return [
            'the_company' => [
                'string',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'position' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'service_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
