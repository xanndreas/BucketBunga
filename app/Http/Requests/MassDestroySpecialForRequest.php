<?php

namespace App\Http\Requests;

use App\Models\SpecialFor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySpecialForRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('special_for_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:special_fors,id',
        ];
    }
}
