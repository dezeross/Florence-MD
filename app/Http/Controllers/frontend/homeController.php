<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\url;
class homeController extends Controller
{
    public function view_home(){
    	$data["slider"] = DB::table("tbl_slider")->orderBy('pk_slider_id',"asc")->get();
    	$data["duan"] = DB::table("tbl_tongquan")->first();
    	$data["news"] = DB::table("tbl_news")->orderBy("pk_news_id","desc")->get();
    	$data["service"] = DB::table("tbl_service")->get();
    	$data['url'] = new url();

        $data["title"] = DB::table("title")->first();
        $data["meta"] = DB::table("tbl_meta")->get();

    	return view('frontend.view_home',$data);
    }
    public function view_news($name){
    	$arr = explode("-", $name);
    	$pk_news_id = str_replace(".htm", "",$arr[count($arr)-1]);
    	$data["news"] = DB::table("tbl_news")->where("pk_news_id","=",$pk_news_id)->first();
    	$data["news_other"] = DB::table("tbl_news")->where("pk_news_id","<>",$pk_news_id)->paginate(6);
    	$data['url'] = new url();
    	if (!$data["news"]) {
    		return redirect(url("/error"));
    	}else{
    	return view("frontend.view_news",$data);}
    }
    public function view_contact(){
    	return view('frontend.view_contact');
    }
}
