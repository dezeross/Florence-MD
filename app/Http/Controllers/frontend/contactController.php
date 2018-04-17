<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class contactController extends Controller
{
    public function contact(Request $request,$name){
        $c_name = $request->c_name;
        $c_phone = $request->c_phone;
        $c_email = $request->c_email;
        $c_message = $request->c_message;
        DB::table("inbox")->insert([
            "c_name"=>$c_name,
            "c_phone"=>$c_phone,
            "c_email"=>$c_email,
            "c_message"=>$c_message,
            "status"=>0
        ]);
        return redirect(url('/tin-tuc/'.$name."?rep=did"));
    }
    public function contact_1(Request $request){
        $c_name = $request->c_name;
        $c_phone = $request->c_phone;
        $c_email = $request->c_email;
        $c_message = $request->c_message;
        DB::table("inbox")->insert([
            "c_name"=>$c_name,
            "c_phone"=>$c_phone,
            "c_email"=>$c_email,
            "c_message"=>$c_message,
            "status"=>0
        ]);
        return redirect(url("/lien-he?rep=did"));
    }
    public function contact_2(Request $request){
    	$c_name = $request->c_name;
    	$c_phone = $request->c_phone;
    	$c_email = $request->c_email;
    	$c_message = "Tải tài liệu";
    	DB::table("inbox")->insert([
    		"c_name"=>$c_name,
    		"c_phone"=>$c_phone,
    		"c_email"=>$c_email,
    		"c_message"=>$c_message,
    		"status"=>0
    	]);
    	return redirect(url("/?rep=did"));
    }
}
