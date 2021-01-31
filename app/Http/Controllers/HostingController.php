<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HostingController extends Controller
{
    public function index()
    {
        return view('FE.service.hosting-service.index');
    }
    public function hosting_type()
    {
        return view('FE.service.hosting-service.hosting-type');
    }
}
