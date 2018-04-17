<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class duanController extends Controller
{
    public function view_du_an(){
        $data["d"]=DB::table("tbl_tongquan")->first();
        return view('backend.view_du_an',$data);
    }
    public function edit_du_an(Request $request){
        $c_name = $request->c_name;
        $c_content = $request->c_content;
        $chinh_sach = $request->chinh_sach;
        DB::table("tbl_tongquan")->update([
            "c_name"=>$c_name,
            "c_content"=>$c_content,
            "chinh_sach"=>$chinh_sach
        ]);
        return redirect(url('admin/du-an'));
    }
}
