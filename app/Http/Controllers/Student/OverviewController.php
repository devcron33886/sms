<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OverviewController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overview_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unanswered = Question::with(['created_by','mentor'])
            ->where('status',null)
            ->where('created_by',\Auth::user()->id);

        $answered = Question::with(['created_by','mentor'])
            ->where('status','1')
            ->where('created_by',\Auth::user()->id)
           ;
        $rejects = Question::with(['created_by','mentor'])
            ->where('status','2');


        $questions = Question::with(['created_by','category','mentor'])
            ->where('created_by',\Auth::user()->id)
            ->get();


        return view('student.overviews.index',compact('unanswered','answered','rejects','questions'));
    }



}
