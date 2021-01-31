<?php
namespace App\Http\Controllers\BE;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        return view('BE.layout.dashboard');
    }

}
