<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Url;
class SuperAdminController extends Controller
{
    public function index()
    { 
        $companies = Company::where('superadmin_id', Auth::user()->id)->get();
        $admins = User::where('role', 'admin')->where('superadmin_id', Auth::user()->id)->get();
        $urls = Url::get();
        return view('super_admin.index', compact('companies', 'admins', 'urls'));

    }
    public function store(Request $request)
    {
        $company = new Company();
        $company->company_name = $request->company_name;
        $company->company_address = $request->company_address;
        $company->superadmin_id = Auth::user()->id;
        $company->save();
        return redirect()->route('superadmin.dashboard');
    }

    public function admin_store(Request $request)
    {
        $admin = new User();
        $admin->name = $request->admin_name;
        $admin->email = $request->admin_email;
        $admin->password = Hash::make($request->admin_password);
        $admin->role = 'admin';
        $admin->superadmin_id = Auth::user()->id;
        $admin->company_id = $request->company_id;
        $admin->save();
        return redirect()->route('superadmin.dashboard');
    }
}
