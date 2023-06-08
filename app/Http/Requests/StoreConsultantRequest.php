<?php

namespace App\Http\Requests;

use App\Models\Consultant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreConsultantRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('consultant_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'short_description' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'photo' => [
                'required',
            ],
        ];
    }
}
