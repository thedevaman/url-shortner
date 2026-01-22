<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        if(Auth::User()->role == 'superadmin')
            {
                return redirect()->route('superadmin.dashboard');
            }

            
            if(Auth::User()->role == 'admin')
                {

                      return redirect()->route('admin.dashboard');
                }
                 if(Auth::User()->role == 'member')
                {

                      return redirect()->route('member.dashboard');
                }
    }
}
