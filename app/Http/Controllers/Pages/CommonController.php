<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class CommonController extends DataController
{
    public function signin(Request $request) {
        if($request->method() == 'POST') {
            $response = $this->verify_signin($request);
            if($response['status'] == 0) {
                return redirect()->back()->withErrors($response['data'])->withInput();
            }
        }
        if ($this->is_admin())   return redirect('/admin/dashboard');
        if ($this->is_client())  return redirect('/client/dashboard');
        return view('common.signin');
    }
    public function signout(Request $request) {
        $this->proceed_signout($request);
        return redirect('/');
    }
    public function signup(Request $request) {
        if($request->method() == 'GET') return view('common.signup');
        else {

        }
    }
    public function forgot_password(Request $request) {
        if ($request->method() == 'GET') return view('common.forgot_password');
        else {
        }
    }
    public function password_reset(Request $request) {
        if($request->method() == 'GET') return view('common.password_reset');
        else {

        }
    }
}
