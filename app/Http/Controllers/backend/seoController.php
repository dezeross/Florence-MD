<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class seoController extends Controller
{
    public function view_seo(){
    	$data["meta"] = DB::table("tbl_meta")->get();
    	$data["title"] = DB::table("title")->first();
    	return view("backend.view_seo",$data);
    }
    public function add_edit_meta(Request $request){
    	$act = $request->get("act");
    	switch ($act) {
    		case 'edit':
    			$id = $request->get("id");
    			$c_name = $request->c_name;
    			$c_content = $request->c_content;
    			DB::table("tbl_meta")->where("pk_meta_id","=",$id)->update([
    				"c_name"=>$c_name,
    				"c_content"=>$c_content
    			]);
    			return redirect(url("/admin/seo"));
    			break;
    		case 'add':
    			$c_name = $request->c_name;
    			$c_content = $request->c_content;
    			DB::table("tbl_meta")->insert([
    				"c_name"=>$c_name,
    				"c_content"=>$c_content
    			]);
    			return redirect(url("/admin/seo"));
    			break;
    	}
    }
    public function edit_title($title){
    	DB::table("title")->update([
    		"c_content"=>$title
    	]);
    	echo $title;
    }
}
