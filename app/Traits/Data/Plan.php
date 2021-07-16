<?php

namespace App\Traits\Data;

use Session;
use Illuminate\Http\Request;

use App\Models\Plan as _Plan;
use App\Traits\Utils;

trait Plan
{
    use Utils;

    public function read_plans(Request $request) {
        $page   = $request->get('page', 1);
        $size   = $request->get('size', $this->PAGE_SIZE_DEFAULT);
        $order  = $request->get('order', 'ASC');
        $sortBy = $request->get('sortBy', 'id');
        $data   = _Plan::orderBy($sortBy, $order)->paginate($size);
        return json_encode($data);
    }

    public function read_plan(Request $request) {
        $data = _Plan::find($request->id);
        return json_encode($data);
    }

    public function upsert_plan(Request $request) {
        if ($request->id < 0) {
            $data               = new _Plan;
            $data->label        = $request->label;
            $data->description  = $request->description;
            $data->price        = $request->price;
            $data->status       = $request->status;
            $data->save();
        } else {
            $data               = _Plan::find($request->id);
            $data->label        = $request->label;
            $data->description  = $request->description;
            $data->price        = $request->price;
            $data->status       = $request->status;
            $data->save();
        }
        return json_encode(['status' => '1']);
    }

    public function delete_plan(Request $request)
    {
        $data = _Plan::find($request->id);
        $data->delete();
        return json_encode(['status' => '1']);
    }
}
