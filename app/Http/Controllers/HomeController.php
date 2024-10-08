<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('home.homepage');
            } elseif ($usertype == 'admin') {
                return view('admin.adminHome');
            } else {
                return redirect()->back();
            }
        }
    }

    public function userHomePage()
    {
        return view('home.homepage');
    }
}
