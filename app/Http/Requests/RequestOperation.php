<?php

namespace App\Http\Requests;

use App\Models\Operation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestOperation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $operationPeriods = Operation::query()
            ->select('period')
            ->get()
            ->pluck('period');

        $operationTypes = Operation::query()
            ->select('type')
            ->get()
            ->pluck('type');

        return [
            'name' => 'required|string',
            'type' => [
                'required', Rule::in($operationTypes)
            ],
            'sum' => 'required|integer',
            'period' => [
                'required', Rule::in($operationPeriods)
            ]
        ];
    }
}
