<?php

namespace App\Http\Requests;

use App\Models\RequestService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequestServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_service_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'service_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
