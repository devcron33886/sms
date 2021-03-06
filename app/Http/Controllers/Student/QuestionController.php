<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::with(['mentor', 'category', 'created_by'])
            ->where('created_by',\Auth::user()->id)
            ->get();

        return view('student.questions.index', compact('questions'));
    }

    public function create()
    {
        abort_if(Gate::denies('question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mentors = User::whereHas('roles', function ($q){
            return $q->where('title','Mentor');
        })->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('student.questions.create', compact('mentors', 'categories'));
    }

    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create([
            'category_id' => $request->category_id,
            'mentor_id' => $request->mentor_id,
            'title' => $request->title,
            'description' => $request->description,
            'created_by' => \Auth::user()->id,
        ]);


        return redirect()->route('student.questions.index');
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mentors = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $question->load('mentor', 'category', 'created_by');

        return view('student.questions.edit', compact('mentors', 'categories', 'question'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->route('student.questions.index');
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('mentor', 'category', 'created_by');

        return view('student.questions.show', compact('question'));
    }

    public function destroy(Question $question)
    {
        abort_if(Gate::denies('question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionRequest $request)
    {
        Question::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
