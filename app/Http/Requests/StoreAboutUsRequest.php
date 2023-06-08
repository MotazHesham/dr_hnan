<?php

namespace App\Http\Requests;

use App\Models\AboutUs;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAboutUsRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('about_us_create');
    }

    public function rules()
    {
        return [
            'morals' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'phone_number_2' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'linkedin' => [
                'string',
                'nullable',
            ],
        ];
    }
}
