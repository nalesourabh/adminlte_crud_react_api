<?php
namespace App\Http\Controllers\Admin;
use App\Models\tbl_unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    //
    public function index()
    {
        $data = tbl_unit::where("unit_status", 0)->paginate(100);
        return response()->json([
            'data' => $data,
            'status_code' => 1
        ]);
    }
    public function trash_index()
    {
        $data = tbl_unit::where("unit_status", 1)->paginate(100);
        return response()->json([
            'data' => $data,
            'status_code' => 1
        ]);
    }
    public function search($search)
    {
        $data = tbl_unit::where("unit_status", 0)
            ->where('unit_name', 'Like', '%' . $search . '%')
            ->paginate(10);
        return response()->json([
            'data' => $data,
            'status_code' => 1
        ]);
    }
    public function store(Request $request)
    {
        // return $request;
        $data = new tbl_unit;
        $data->unit_name = $request->unit_name;
        $result = $data->save();
        if ($result) {
            return response()->json([
                'msg' => 'Unit Create Successfully',
                'data' => $data,
                'status_code' => 1
            ]);
        } else {
            return response()->json([
                'msg' => 'Warning',
                'status_code' => 0
            ]);
        }
    }

    public function edit($id)
    {
        $data = tbl_unit::find($id);
        return response()->json([
            'data' => $data,
            'status_code' => 1
        ]);
    }


    public function update(Request $request)
    {
        $data = tbl_unit::find($request->unit_id);
        $data->unit_name = $request->unit_name;
        $result = $data->save();
        if ($result) {
            return response()->json([
                'msg' => 'Unit Update Successfully',
                'data' => $data,
                'status_code' => 1
            ]);
        } else {
            return response()->json([
                'msg' => 'Warning',
                'status_code' => 0
            ]);
        }
    }

    public function status($id)
    {
        $data = tbl_unit::where('unit_id', $id)->first();
        if ($data->unit_status == 0) {
            $data->unit_status = 1;
            $result = $data->save();
            if ($result) {
                return response()->json([
                    'msg' => "Data Trash Successfully.",
                    'status_code' => 1
                ]);
            } else {
                return response()->json([
                    'msg' => 'Warning',
                    'status_code' => 0
                ]);
            }
        } else {
            $data->unit_status = 0;
            $result = $data->save();

            if ($result) {
                return response()->json([
                    'msg' => "Data Restore Successfully.",
                    'status_code' => 1
                ]);
            } else {
                return response()->json([
                    'msg' => 'Warning',
                    'status_code' => 0
                ]);
            }
        }
    }
}
