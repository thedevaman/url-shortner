<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Url;
use Auth;
use Hash;

class AdminController extends Controller
{
   public function index()
    { 
        $admins = User::where('admin_id', Auth::user()->id)->where('role', 'admin')->where('company_id', Auth::user()->company_id)->get();
        $members = User::where('admin_id', Auth::user()->id)->where('role', 'member')->where('company_id', Auth::user()->company_id)->get();
        $urls = Url::where('company_id', Auth::user()->company_id)->get();
        return view('admin.index', compact('admins', 'members', 'urls'));

    }

    public function store(Request $request)
    {
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->admin_id = Auth::user()->id;
        $admin->company_id = Auth::user()->company_id;
        $admin->superadmin_id = Auth::user()->superadmin_id;
        $admin->role = 'admin';
        $admin->save();
        return redirect()->route('admin.dashboard');
    }

    public function member_store(Request $request)
    {
        $member = new User();
        $member->name = $request->name;
        $member->email = $request->email;
        $member->password = Hash::make($request->password);
        $member->admin_id = Auth::user()->id;
        $member->company_id = Auth::user()->company_id;
        $member->superadmin_id = Auth::user()->superadmin_id;
        $member->role = 'member';
        $member->save();
        return redirect()->route('admin.dashboard');
    }
}
