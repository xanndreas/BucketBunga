<?php

namespace App\Http\Requests;

use App\Models\Item;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'colors.*' => [
                'integer',
            ],
            'colors' => [
                'array',
            ],
            'special_fors.*' => [
                'integer',
            ],
            'special_fors' => [
                'array',
            ],
            'price' => [
                'required',
            ],
            'rating' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
