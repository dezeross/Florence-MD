<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
class serviceController extends Controller
{
    public function view_service(){
    	$data["service"] = DB::table("tbl_service")->get();
    	return view('backend.view_service',$data);
    }
    public function add_service(Request $request){
    	$act = $request->get('act');
    	switch ($act) {
    		case 'add':
    			$c_caption = $request->c_caption;
    			$c_title = $request->c_title;
		    	if ($request->hasFile('c_img')) {
		    		$file = $request->file('c_img');
		    		$name_file = $file->getClientOriginalName();
		    		File::move($file,"public/upload/services/".$name_file);
		    		DB::table("tbl_service")->insert([
		    			"c_img"=>$name_file,
		    			"c_caption"=>$c_caption,
		    			"c_title"=>$c_title
		    		]);
		    	}
		    	return redirect(url('admin/service'));
    			break;
    		case 'edit':
    			$id = $request->get('id');
    			$c_caption = $request->c_caption;
    			$c_title = $request->c_title;
    			$s = DB::table("tbl_service")->where('pk_service_id',"=",$id)->first();
		    	if ($request->hasFile('c_img')) {
		    		$file = $request->file('c_img');
		    		$name_file = $file->getClientOriginalName();
		    		if (File::exists("public/upload/services/".$s->c_img)) {
		    			File::delete("public/upload/services/".$s->c_img);
		    		}
		    		File::move($file,"public/upload/services/".$name_file);
		    		DB::table("tbl_service")->where('pk_service_id',"=",$id)->update(["c_img"=>$name_file]);
		    	}
		    	DB::table("tbl_service")->where('pk_service_id',"=",$id)->update(["c_caption"=>$c_caption,"c_title"=>$c_title]);

		    	return redirect(url('admin/service'));
    			break;
    	}

    }
    public function delete_service($id){
    	$img = DB::table("tbl_service")->where("pk_service_id","=",$id)->first();
    	if (File::exists('public/upload/services/'.$img->c_img)) {
    		File::delete('public/upload/services/'.$img->c_img);    	}
    	DB::table("tbl_service")->where("pk_service_id","=",$id)->delete();

		return redirect(url('admin/service'));

    }
}
