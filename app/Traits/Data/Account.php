<?php

namespace App\Traits\Data;

use Session;
use App\Models\Account as _Account;
use App\Traits\Utils;
use Illuminate\Http\Request;

trait Account
{
    use Utils;

    // ACCOUNTS
    public function read_accounts(Request $request)
    {
        $page   = $request->get('page', 1);
        $size   = $request->get('size', $this->PAGE_SIZE_DEFAULT);
        $order  = $request->get('order', 'ASC');
        $sortBy = $request->get('sortBy', 'id');
        $data   = _Account::whereBetween('status', [1, 3])->orderBy($sortBy, $order)->paginate($size);
        return json_encode($data);
    }
    public function read_clients(Request $request)
    {
        $page   = $request->get('page', 1);
        $size   = $request->get('size', $this->PAGE_SIZE_DEFAULT);
        $order  = $request->get('order', 'ASC');
        $sortBy = $request->get('sortBy', 'id');
        $data   = _Account::where('role_id', 2)->orderBy($sortBy, $order)->paginate($size);
        return json_encode($data);
    }
    public function read_account(Request $request) {
        $data = _Account::find($request->id);
        return json_encode($data);
    }
    public function upsert_account(Request $request)
    {
        if ($request->id < 0) {
            $account = new _Account;
            $account->role_id       = $request->role_id;
            $account->fullname      = $request->fullname;
            $account->email         = $request->email;
            $account->phone         = $request->phone;
            $account->address       = $request->address;
            $account->city          = $request->city;
            $account->state         = $request->state;
            $account->country       = $request->country;
            $account->zip           = $request->zip;

            $account->password      = Hash::make($request->password);
            $account->access_token  = $this->generateAccessToken($request->email);

            $account->save();
        } else {
            $account = _Account::find($request->id);
            $account->role_id   = $request->role_id;
            $account->fullname  = $request->fullname;
            $account->email     = $request->email;
            $account->phone     = $request->phone;
            $account->address   = $request->address;
            $account->city      = $request->city;
            $account->state     = $request->state;
            $account->country   = $request->country;
            $account->zip       = $request->zip;
            $account->save();
        }
        return json_encode(['status' => '1']);
    }
    public function delete_account(Request $request)
    {
        $account = _Account::find($request->id);
        $account->delete();
        return json_encode(['status' => '1']);
    }

}
