<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HodController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $hods = User::whereHas('roles', function($q){
            return $q->where('title','HOD');
        })->get();
        return view('dean.hods.index',compact('hods'));
    }
}
