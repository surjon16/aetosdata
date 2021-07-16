<?php

namespace App\Traits\Data;

use Session;
use Illuminate\Http\Request;

use App\Models\Role as _Role;
use App\Traits\Utils;

trait Role
{
    use Utils;

    public function read_roles(Request $request) {
        $page   = $request->get('page', 1);
        $size   = $request->get('size', $this->PAGE_SIZE_DEFAULT);
        $order  = $request->get('order', 'ASC');
        $sortBy = $request->get('sortBy', 'id');
        $data   = _Role::orderBy($sortBy, $order)->paginate($size);
        return json_encode($data);
    }

    public function read_role(Request $request) {
        $data = _Role::find($request->id);
        return json_encode($data);
    }

    public function upsert_role(Request $request) {
        if ($request->id < 0) {
            $data       = new _Role;
            $data->role = $request->role;
            $data->save();
        } else {
            $data       = _Role::find($request->id);
            $data->role = $request->role;
            $data->save();
        }
        return json_encode(['status' => '1']);
    }

    public function delete_role(Request $request)
    {
        $data = _Role::find($request->id);
        $data->delete();
        return json_encode(['status' => '1']);
    }
}
