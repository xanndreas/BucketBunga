<?php

namespace App\Http\Requests;

use App\Models\SpecialFor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSpecialForRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('special_for_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
