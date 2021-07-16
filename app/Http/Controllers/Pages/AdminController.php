<?php

namespace App\Http\Controllers\Pages;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\DataController;

class AdminController extends DataController
{
    public function __construct() {
        $this->middleware(function($request, $next) {
            if ($this->is_admin()) return $next($request);
            return redirect('/');
        });
    }
    public function dashboard(Request $request) {
        return view('admin.dashboard');
    }
    public function plans(Request $request) {
        $data = [
            'plans' => json_decode($this->read_plans($request)),
        ];
        return view('admin.plans', $data);
    }
    public function clients(Request $request) {
        $data = [
            'clients' => json_decode($this->read_clients($request)),
        ];
        return view('admin.clients', $data);
    }
    public function transactions(Request $request)
    {
        return view('admin.transactions');
    }
    public function settings(Request $request) {
        $data = [
            'roles'                 => json_decode($this->read_roles($request)),
            'sidebar_items'         => json_decode($this->read_sidebar_items($request)),
            'sidebar_role_access'   => json_decode($this->read_sidebar_role_access($request)),
        ];
        return view('admin.settings', $data);
    }
}
