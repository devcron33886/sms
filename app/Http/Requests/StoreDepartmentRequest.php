<?php

namespace App\Http\Requests;

use App\Models\Department;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepartmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Gate::allows('department_create');
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:departments',
            ],
            'short_name' => [
                'string',
                'required',
                'unique:departments',
            ],
        ];
    }
}
