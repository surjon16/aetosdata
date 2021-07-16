<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;

class ClientController extends Controller
{
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
