<?php

namespace App\Http\Controllers;
use App\Models\Url;
use Auth;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function short_url_store(Request $request)
    {
        $url = new Url();
        $url->company_id = Auth::user()->company_id;
        $url->user_id = Auth::user()->id;
        $url->short_url = $request->short_url;
        $url->long_url = $request->long_url;
        $url->save();
        return redirect()->back();
    }

    public function redirect(Request $request)
    {
        $url = Url::where('short_url', $request->short_url)->first();
        if ($url) {
            return redirect($url->long_url);
        }
        return redirect()->back();
    }
}
