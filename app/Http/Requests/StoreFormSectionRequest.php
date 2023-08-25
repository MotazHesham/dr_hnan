<?php

namespace App\Http\Requests;

use App\Models\FormSection;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFormSectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'form_section_name' => [
                'string',
                'nullable',
            ],
            'fields' => [ 
                'nullable',
            ],
            'file_name' => [
                'string',
                'nullable',
            ],
            'service_id' => [
                'required',
                'integer',
            ],
        ];
    }
}