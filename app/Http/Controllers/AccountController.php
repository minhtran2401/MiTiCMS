<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('FE.service.account-service.index');
    }
    public function account_detail()
    {
        return view('FE.service.account-service.account-detail');
    }
}
