<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::where('status',1)->paginate(5);
        return view('welcome',compact('testimonials'));
    }
}
