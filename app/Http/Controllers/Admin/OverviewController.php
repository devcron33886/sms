<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOverviewRequest;
use App\Http\Requests\StoreOverviewRequest;
use App\Http\Requests\UpdateOverviewRequest;
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
            ->count();

        $answered = Question::with(['created_by','mentor'])
            ->where('status','1')
            ->count();
        $rejects = Question::with(['created_by','mentor'])
            ->where('status','2')
            ->count();


        $questions = Question::with(['created_by','category','mentor'])
            ->get();


        return view('admin.overviews.index',compact('unanswered','answered','rejects','questions'));
    }



}
