<?php

namespace App\Http\Requests;

use App\Models\Testimonial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestimonialRequest extends FormRequest
{
    /**
     *
     * @return bool
     */


    public function authorize(): bool
    {
        return Gate::allows('testimonial_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'message' => [
                'required',
            ],

        ];
    }
}
