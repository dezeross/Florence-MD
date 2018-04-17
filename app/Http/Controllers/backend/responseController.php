<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
class responseController extends Controller
{
    public function view_inbox(){
    	$data["inbox"] = DB::table("inbox")->orderBy("pk_inbox_id","desc")->paginate(15);
    	return view("backend.inbox",$data);
    }
    public function delete($id){
    	DB::table("inbox")->where("pk_inbox_id","=",$id)->delete();
    	return redirect(url('admin/inbox'));
    }
    public function send_mail(Request $request){
    	$title = $request->title;
    	$message = html_entity_decode($request->message);
    	$to_email = $request->customer_email;
    	$to_name = $request->customer_name;
    	$to_phone = $request->customer_phone;
    	$data= [
    		"title"=>$title,
    		"to_message"=>$message,
    		"to_email"=>$to_email,
    		"to_name"=>$to_name,
    		"to_phone"=>$to_phone
    	];
    	// echo html_entity_decode($data["message"]);
    	Mail::send("mails.send_customer",$data,function($mgn) use($to_email){
    		$mgn->from("duongcn07@gmail.com","Duong Vu");
    		$mgn->to($to_email,"ICID Complex")->subject("ICID Complex");
    	});
        $pk_inbox_id = $request->pk_inbox_id;
        DB::table("inbox")->where("pk_inbox_id","=",$pk_inbox_id)->update(array("status"=>1));
    	return redirect(url("admin/inbox?act=did"));
    }
}
