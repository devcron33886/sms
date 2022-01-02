<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected  function authenticated(Request $request, $user)
    {
        if ($user->access_level == 1)
        {
            return redirect()->route('admin.home');
        }
        if ($user->access_level == 2){
            return redirect()->route('dean.home');
        }
        if ($user->access_level == 3)
        {
            return redirect()->route('mentor.dashboard.index');
        }
        if ($user->access_level == 4)
        {
            return redirect()->route('student.overviews.index');
        }
        if ($user->access_level == 5)
        {
            return redirect()->route('hod.home');
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
