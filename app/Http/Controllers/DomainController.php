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
        $ip = gethostbyname($domain);
        // if ( gethostbyname($domain) != $domain ) {
        //     return response()->json('Tên miền này đã có người sử dụng'); //có domain
        //    }
        //    else {
        //     return response()->json('Bạn có thể mua tên miền này !'); //không có domain
        //    }
        return response()->json($domain); //không có domain

    }
}
