<?php

namespace App\Http\Requests;

use App\Models\Question;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuestionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('question_edit');
    }

    public function rules()
    {
        return [
            'mentor_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],

            'created_by'
            => [
                \Auth::user()->id
            ],
            'answer' => [
                'required',
            ],
        ];
    }
}
