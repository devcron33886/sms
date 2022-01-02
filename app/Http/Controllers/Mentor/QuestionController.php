<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::with(['mentor', 'category'])
            ->where('mentor_id', Auth::user()->id)
            ->get();

        return view('mentor.questions.index', compact('questions'));
    }

    public function edit(Question $question)
    {
        abort_if(Gate::denies('question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mentors = User::whereHas('roles', function ($q) {
            return $q->where('title', 'Mentor');
        })->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $question->load('mentor', 'category', 'created_by');

        return view('mentor.questions.edit', compact('mentors', 'categories', 'question'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->all());

        return redirect()->route('mentor.questions.index');
    }

    public function show(Question $question)
    {
        abort_if(Gate::denies('question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $question->load('mentor', 'category', 'created_by');

        return view('mentor.questions.show', compact('question'));
    }


}
