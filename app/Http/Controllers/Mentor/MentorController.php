<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $questions = Question::with('mentor','category','created_by')
            ->where('mentor_id',\Auth::user()->id)
            ->get();
        $unanswered = Question::with(['mentor','category','created_by'])
            ->where('status',null)
            ->where('mentor_id' , \Auth::user()->id);
        $answered = Question::with(['mentor','category','created_by'])
            ->where('status',1)
            ->where('mentor_id' , \Auth::user()->id);
        $testimonials =Testimonial::with('created_by')
            ->get();


        return view('mentor.mentor',compact('questions','unanswered','answered','testimonials'));
    }
}
