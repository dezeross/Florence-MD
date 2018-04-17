<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
class newsController extends Controller
{
    public function view_news(){
    	$data["news"] = DB::table("tbl_news")->orderBy("pk_news_id","desc")->paginate(15);
    	return view('backend.view_news',$data);
    }
    public function add_edit_news(Request $request){
    	$act = $request->get("act");
    	switch ($act) {
    		case 'edit':
    			$id = $request->get("id")!=null?$request->get("id"):0;
    			$i = DB::table("tbl_news")->where("pk_news_id","=",$id)->first();
    			$c_name = $request->c_name;
    			$c_description = $request->c_description;
    			$c_content = $request->c_content;
    			if ($request->file("c_img")!=null) {
    				$file = $request->file("c_img");
    				$name_file =$file->getClientOriginalName();
    				if (File::exists("public/upload/news/".$i->c_img)) {
    					File::delete(asset("public/upload/news/".$i->c_img));
    				}
    				File::move($file,"public/upload/news/".$name_file);
    				DB::table("tbl_news")->where("pk_news_id","=",$id)->update(array("c_img"=>$name_file));
    			}
    			date_default_timezone_set('Asia/Bangkok');
    			DB::table("tbl_news")->where("pk_news_id","=",$id)->update(array("c_name"=>$c_name,"c_description"=>$c_description,"c_content"=>$c_content,"created_at"=>date("Y-m-d h:i:s")));
    			return redirect(url("admin/news?reply=did"));
    			break;
   			case 'add':
   				$c_name = $request->c_name;
    			$c_description = $request->c_description;
    			$c_content = $request->c_content;
    			$file = $request->file("c_img");
    			date_default_timezone_set('Asia/Bangkok');
    			$time = date("Y-m-d h:i:s");
    			$name_file = $file->getClientOriginalName();
    			File::move($file,"public/upload/news/".$name_file);
    			DB::table("tbl_news")->insert([
    				"c_name"=>$c_name,
    				"c_description"=>$c_description,
    				"c_content"=>$c_content,
    				"c_img"=>$name_file,
    				"created_at"=>$time
    			]);
    			return redirect(url("admin/news?reply=did"));
   				break;
    	}
    }
    public function delete_news($id){
        $i = DB::table("tbl_news")->where("pk_news_id","=",$id)->first();
        if (File::exists('public/upload/news/'.$i->c_img)) {
            File::delete('public/upload/news/'.$i->c_img);
        }
        DB::table("tbl_news")->where("pk_news_id","=",$id)->delete();
        return redirect(url("admin/news"));
    }
}
