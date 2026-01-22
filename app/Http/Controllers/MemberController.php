<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Auth;
class MemberController extends Controller
{
     public function index()
    { 
       $urls = Url::where('user_id', Auth::user()->id)->get();
        return view('member.index', compact('urls'));

    }
}
