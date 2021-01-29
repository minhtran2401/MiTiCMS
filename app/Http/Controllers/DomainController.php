<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        return view('FE.service.domain-service.index');
    }
    public function view_check_domain()
    {
        return view('FE.service.domain-service.check-domain');
    }
    public function check_domain(Request $request){
        $domain = $request->get('name-domain');
        return response()->json($domain); //không có domain
    }
    public function view_reg_domain(){
        return view('FE.service.domain-service.reg-domain');
    }
}
