<?php

namespace App\Http\Requests;

use App\Models\Joining;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJoiningRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('joining_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'gender' => [
                'required',
            ],
            'nationality' => [
                'required',
            ],
            'qualification' => [
                'required',
            ],
            'experience_years' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'cv' => [
                'required',
            ],
        ];
    }
}
