<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
class imgController extends Controller
{
    public function view_slider(){
    	$data["img"]=DB::table("tbl_slider")->orderBy("pk_slider_id","desc")->paginate(15);
    	return view("backend.view_slider",$data);
    }
    public function add_slider(Request $request){
    	$act=$request->get('act');
    	switch ($act) {
    		case 'add':
    			$c_caption = $request->c_caption;
    			$alt = $request->alt;
    			$file = $request->file('c_img');
    			$name_file = str_random(5).$file->getClientOriginalName();
    			File::move($file,"public/upload/slider/".$name_file);
    			DB::table("tbl_slider")->insert([
    				
    				"c_img"=>$name_file,
    				"c_caption"=>$c_caption,
    				"alt"=>$alt
    			]);
    			return redirect(url('admin/images/slider?reply=did'));
    			break;
    		case 'edit':
    			$c_caption = $request->c_caption;
    			$alt = $request->alt;
    			$id = $request->get('id');
    			$old_img = DB::table("tbl_slider")->where("pk_slider_id","=",$id)->first();
    			if ($request->hasFile('c_img')) {
    				$file = $request->file('c_img');
	    			$name_file = str_random(5).$file->getClientOriginalName();
	    			File::move($file,"public/upload/slider/".$name_file);
	    			if (File::exists("public/upload/slider/".$old_img->c_img)) {
	    				File::delete("public/upload/slider/".$old_img->c_img);
	    			}
	    			DB::table("tbl_slider")->where("pk_slider_id","=",$id)->update([
	    				"c_img"=>$name_file
	    			]);
    			}
    			DB::table("tbl_slider")->where("pk_slider_id","=",$id)->update([
	    				"c_caption"=>$c_caption,
	    				"alt"=>$alt
	    			]);
    			return redirect(url('admin/images/slider/'));
    			break;
    		
    	}
    }
    public function delete_slider($id){
    	$old_img = DB::table("tbl_slider")->where("pk_slider_id","=",$id)->first();
    	if (File::exists("public/upload/slider/".$old_img->c_img)) {
    		File::delete("public/upload/slider/".$old_img->c_img);
    	}
    	DB::table('tbl_slider')->where("pk_slider_id","=",$id)->delete();
    	return redirect(url('admin/images/slider/'));
    }
    public function view_upload(){
        $data['images'] = DB::table("tbl_images")->orderBy("pk_images_id","desc")->paginate(15);
        $data["slider"] = DB::table("tbl_slider")->paginate(15);
        $data["news"] = DB::table("tbl_news")->paginate(15);
        $data["service"] = DB::table("tbl_service")->paginate(15);
        $data["admin"] = DB::table("users")->paginate(15);
        return view("backend.view_upload",$data);
    }
    public function add_upload(Request $request){  
        $file = $request->file('c_img');
        $name_file = str_random(8).$file->getClientOriginalName();
        File::move($file,"public/upload/images/".$name_file);
        $alt = $request->alt;
        DB::table("tbl_images")->insert([
            "c_img"=>$name_file,
            "alt"=>$alt
        ]);
        return redirect(url('admin/upload-images/'));
    }
}
