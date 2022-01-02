<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTestimonialRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('testimonial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonials = Testimonial::with(['created_by', 'user'])->get();

        return view('student.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        abort_if(Gate::denies('testimonial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('student.testimonials.create', compact('users'));
    }

    public function store(StoreTestimonialRequest $request)
    {
        $testimonial = Testimonial::create([
            'title' => $request->title,
            'message' =>$request->message,
            'user_id' => \Auth::user()->id,
        ]);

        return redirect()->route('student.testimonials.index');
    }

    public function edit(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $testimonial->load('created_by', 'user');

        return view('student.testimonials.edit', compact('users', 'testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $testimonial->update($request->all());

        return redirect()->route('student.testimonials.index');
    }

    public function show(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonial->load('created_by', 'user');

        return view('student.testimonials.show', compact('testimonial'));
    }

    public function destroy(Testimonial $testimonial)
    {
        abort_if(Gate::denies('testimonial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testimonial->delete();

        return back();
    }

    public function massDestroy(MassDestroyTestimonialRequest $request)
    {
        Testimonial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
