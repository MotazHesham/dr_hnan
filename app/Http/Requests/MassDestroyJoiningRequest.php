<?php

namespace App\Http\Requests;

use App\Models\Joining;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJoiningRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('joining_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:joinings,id',
        ];
    }
}
