<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VpsController extends Controller
{
    public function index()
    {
        return view('FE.service.vps-service.index');
    }
    public function vps_type()
    {
        return view('FE.service.vps-service.vps-type');
    }
   
}
