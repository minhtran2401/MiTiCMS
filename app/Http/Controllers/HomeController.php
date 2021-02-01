<?php

namespace App\Http\Controllers;

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
    public function home()
    {
        return view('FE.home');
    }
    public function contact()
    {
        return view('FE.contact');
    }
    public function profile()
    {
        return view('FE.user-profile.profile');
    }
    public function edit_profile()
    {
        return view('FE.user-profile.edit-profile');
    }
    public function changepassword()
    {
        return view('FE.user-profile.changepassword');
    }
    
    public function index()
    {
        return view('FE.home');
    }
}
