<?php

namespace App\Traits\Data;

use App\Traits\Utils;
use App\Traits\Data\Account;
use App\Traits\Data\Plan;
use App\Traits\Data\Role;
use App\Traits\Data\Sidebar;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

trait Common
{
    use Utils;
    use Account, Plan, Role, Sidebar;

    public function is_admin() {
        $account = Auth::user();
        if ($account) if ($account->role_id == 1) return true;
        return false;
    }
    public function is_client() {
        $account = Auth::user();
        if ($account) if ($account->role_id == 2) return true;
        return false;
    }
    public function current_account() {
        return $this->sendJsonResponse("", Auth::user());
    }
    public function verify_signin(Request $request) {

        $validator = Validator::make($request->post(), [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendResponse(0, $validator->getMessageBag()->toArray());
        }

        $email      = $request->post('email');
        $password   = $request->post('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return $this->sendResponse(1, Auth::user()->toArray());
        } else {
            return $this->sendResponse(0, ['message' => 'Invalid Credentials']);
        }
    }
    public function proceed_signout(Request $request) {
        Auth::logout();
    }
    public function reset_password(Request $request) {

    }

}
