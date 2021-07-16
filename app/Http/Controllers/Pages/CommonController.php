<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class CommonController extends DataController
{
    public function signin(Request $request) {
        if($request->method() == 'GET') return view('common.signin');
        else {

        }
    }
    public function signup(Request $request) {
        if($request->method() == 'GET') return view('common.signup');
        else {

        }
    }
    public function password_reset(Request $request) {
        if($request->method() == 'GET') return view('common.password_reset');
        else {

        }
    }
}
