<?php

namespace App\Http\Requests;

use App\Models\RequestService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequestServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_service_edit');
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
