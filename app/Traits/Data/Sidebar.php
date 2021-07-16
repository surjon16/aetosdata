<?php

namespace App\Traits\Data;

use Session;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Sidebar as _Sidebar;
use App\Models\SidebarRoleAccess;
use App\Traits\Utils;
use Illuminate\Support\Facades\Auth;

trait Sidebar
{
    use Utils;

    public function current_sidebar() {
        $user       = Auth::user();
        $sidebar    = Role::find($user->role_id)->sidebar;
        return $sidebar;
    }

    public function read_sidebar_items(Request $request) {
        $page   = $request->get('page', 1);
        $size   = $request->get('size', $this->PAGE_SIZE_DEFAULT);
        $order  = $request->get('order', 'ASC');
        $sortBy = $request->get('sortBy', 'id');
        $data   = _Sidebar::orderBy($sortBy, $order) ->paginate($size);
        return json_encode($data);
    }

    public function read_sidebar_item(Request $request) {
        $data = _Sidebar::find($request->id);
        return json_encode($data);
    }

    public function upsert_sidebar_item(Request $request) {
        if($request->id < 0) {
            $data               = new _Sidebar;
            $data->title        = $request->title;
            $data->element_id   = $request->element_id;
            $data->link         = $request->link;
            $data->icon         = $request->icon;
            $data->save();
        } else {
            $data               = _Sidebar::find($request->id);
            $data->title        = $request->title;
            $data->element_id   = $request->element_id;
            $data->link         = $request->link;
            $data->icon         = $request->icon;
            $data->save();
        }
        return json_encode(['status' => '1']);
    }

    public function delete_sidebar_item(Request $request) {
        $data = _Sidebar::find($request->id);
        $data->delete();
        return json_encode(['status' => '1']);
    }

    public function read_sidebar_role_access(Request $request) {
        $page   = $request->get('page', 1);
        $size   = $request->get('size', 10);
        $order  = $request->get('order', 'ASC');
        $sortBy = $request->get('sortBy', 'id');
        $data   = SidebarRoleAccess::orderBy($sortBy, $order)->paginate($size);
        return json_encode($data);
    }

    public function upsert_sidebar_role_access(Request $request)
    {
        if ($request->id < 0) {
            $data               = new SidebarRoleAccess;
            $data->role_id      = $request->role_id;
            $data->sidebar_id   = $request->sidebar_id;
            $data->save();
        } else {
            $data               = SidebarRoleAccess::find($request->id);
            $data->role_id      = $request->role_id;
            $data->sidebar_id   = $request->sidebar_id;
            $data->save();
        }
        return json_encode(['status' => '1']);
    }

    public function delete_sidebar_role_access(Request $request) {
        $data = SidebarRoleAccess::find($request->id);
        $data->delete();
        return json_encode(['status' => '1']);
    }

}
