<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;

class AdminController extends DataController
{
    public function dashboard(Request $request) {
        return view('admin.dashboard');
    }
    public function plans(Request $request) {
        return view('admin.plans');
    }
    public function accounts(Request $request) {
        return view('admin.accounts');
    }
    public function transactions(Request $request)
    {
        return view('admin.transactions');
    }
    public function settings(Request $request) {
        return view('admin.settings');
    }
}
