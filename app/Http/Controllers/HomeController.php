<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::with('user')
            ->where('status',1)
            ->orderBy('id','desc')
            ->get();
        /*dd($testimonials);*/
        return view('welcome',compact('testimonials'));
    }
}
