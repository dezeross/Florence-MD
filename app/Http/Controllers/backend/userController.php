<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use File;
use Hash;
class userController extends Controller
{
    public function view_user(){
    	$auth = Auth::user()->email;
    	$auth = "%".$auth."%";
    	$user = DB::table("users")->where("email","like",$auth)->first();
    	$data["user"] = $user;
    	return view("backend.dashboard",$data);
    }
    public function profile(){
    	$auth = Auth::user()->email;
    	$auth = "%".$auth."%";
    	$user = DB::table("users")->where("email","like",$auth)->first();
    	$data["user"] = $user;
    	return view("backend.user_profile",$data);
    }
    public function view_edit($id){
    	$data["user"] = DB::table("users")->where("id","=",$id)->first();
    	return view("backend.edit_user",$data);
    }
    public function edit(Request $request,$id){
        $file =  $request->file("c_img");
        $user = DB::table("users")->where("id","=",$id)->first();
        if ($file) {
            File::delete("public/upload/admin/".$user->c_img);
            $name_img = str_random(8)."-".$file->getClientOriginalName();
            File::move($file,"public/upload/admin/".$name_img);
            DB::table("users")->where("id","=",$id)->update(array("c_img"=>$name_img));
        }
        $name = $request->name;
        $password  = $request->password;
        $confirm_password = $request->confirm_password;
        $error_input = array();
        if ($name=="") {
            array_push($error_input, "Name - Empty");
        }
        if ($password=="") {
            array_push($error_input,"Password - Empty");
        }
        if ($password!=$confirm_password) {
            array_push($error_input,"Confirm Password - Not Correct");
        }
        if (strlen($password)<8) {
            array_push($error_input,"Password - Minimum 8 characters");
        }
        if (count($error_input)!=0) {
            $data["err"] = $error_input;
            $data["user"] = DB::table("users")->where("id","=",$id)->first();
            return view("backend.edit_user",$data);
        }else{
            $token = $request->_token;
            $password = Hash::make($password);
            date_default_timezone_set('Asia/Bangkok');
             $date = date("Y-m-d H:i:s");
             DB::table("users")->where("id","=",$id)->update(array("name"=>$name,"password"=>$password,"updated_at"=>$date,"remember_token"=>$token));
             return redirect(url("admin"));
        }
    }



    public function view_add(){
        return view("backend.edit_user");
    }
    public function add(Request $request){
        $file =  $request->file("c_img");
        $email = $request->email;
        $name = $request->name;
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        $err = array();
        if ($name == "") {
            array_push($err, "Name - Empty");
        }
        if ($file) {
            $name_img = str_random(8)."-".$file->getClientOriginalName();
        }else{
            array_push($err, "Choose file - avatar");
        }
        
        if ($password!=$confirm_password) {
            array_push($err,"Confirm Password - Not Correct");
        }
        if (strlen($password)<8) {
            array_push($err,"Password - Minimum 8 characters");
        }
        if (count($err)!=0) {
            $data["err"] = $err;
            return view("backend.edit_user",$data);
        }else{
            $token = $request->_token;
            $password = Hash::make($password);
            date_default_timezone_set('Asia/Bangkok');
             $date = date("Y-m-d H:i:s");
             File::move($file,"public/upload/admin/".$name_img);
             DB::table("users")->insert(array("email"=>$email,"name"=>$name,"password"=>$password,"created_at"=>$date,"updated_at"=>$date,"c_img"=>$name_img,"remember_token"=>$token));
             return redirect(url("admin"));
        }

    }

}
