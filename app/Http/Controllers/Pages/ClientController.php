<?php

namespace App\Http\Controllers\Pages;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class ClientController extends DataController
{
    public function __construct() {
        $this->middleware(function($request, $next) {
            if ($this->is_client()) return $next($request);
            return redirect('/');
        });
    }
    public function dashboard(Request $request) {
        return view('client.dashboard');
    }
    public function search(Request $request) {
        return view('client.search');
    }
    public function plans(Request $request) {
        return view('client.plans');
    }
    public function transactions(Request $request) {
        return view('client.transactions');
    }
    public function settings(Request $request) {
        return view('client.settings');
    }
}
