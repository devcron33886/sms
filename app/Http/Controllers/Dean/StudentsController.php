<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use Gate;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class StudentsController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $students = User::whereHas('roles', function($q){
           return $q->where('title','Student');
        })->get();
        return view('dean.students.index',compact('students'));
    }


}
