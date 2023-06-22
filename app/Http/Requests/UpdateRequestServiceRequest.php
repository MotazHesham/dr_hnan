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
            'contract' => [
                'required', 
            ],
            'cost_1' => [
                'required', 
            ],
            'cost_2' => [
                'required', 
            ],
            'start_date' => [
                'required', 
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'required', 
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
