<?php

namespace App\Http\Controllers\BE;
use App\Models\LogAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogController extends Controller
{
    public function admin(){
        $ds = LogAdmin::orderby('created_at','desc')->get();
        return view('BE.log.log-admin', compact('ds'));
    }
}
