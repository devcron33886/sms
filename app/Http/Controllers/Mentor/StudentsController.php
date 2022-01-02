<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use Gate;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('student_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $students = User::whereHas('roles', function($q){
           return $q->where('title','Student');
        })->get();
        return view('mentor.students.index',compact('students'));
    }


}
