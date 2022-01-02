<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;

use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MentorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mentor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mentors = User::whereHas('roles', function($q){
            return $q->where('title','Mentor');
        })->get();

        return view('dean.mentors.index',compact('mentors'));
    }


}
