<?php 
namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
class propertyController extends Controller
{
	public function view_property(){
		$data['property'] = DB::table("tbl_property")->orderBy("pk_property_id","desc")->get();
		return view('backend.view_property',$data);
	}
	public function add_edit_property(Request $request){
		$act = $request->get("act");
		switch ($act) {
			case 'add':
				$file = $request->file('c_img');
				$arr_img = array();
				if ($request->hasFile('c_img')) {
					foreach ($file as $rows) {
						$nameFile  = $rows->getClientOriginalName();
						if (File::exists("public/upload/property/".$nameFile)) {
							$nameFile = $nameFile."-".str_ramdom(5);
						}
						File::move($rows,"public/upload/property/".$nameFile);
						array_push($arr_img, $nameFile);
					}
				}
				$c_img = json_encode($arr_img);
				$c_name = $request->c_name;
				$c_caption = $request->c_caption;
				$fk_tower_id  = $request->fk_tower_id;
				$tang = $request->tang;
				$phong = $request->phong;
				DB::table("tbl_property")->insert([
					"c_name"=>$c_name,
					"c_caption"=>$c_caption,
					"c_img"=>$c_img,
					"fk_tower_id"=>$fk_tower_id,
					"tang"=>$tang,
					"phong"=>$phong
				]);
				return redirect(url('admin/property?reply=did'));
				break;
			case 'edit':
				$id = $request->get("id");
				$arr_img = array();
				$p = DB::table("tbl_property")->where("pk_property_id","=",$id)->first();
				if ($request->hasFile('c_img')) {
					$file = $request->file("c_img");
					$img  = json_decode($p->c_img);					
					foreach ($img as $i) {
						if (File::exists("public/upload/property/".$i)) {
							File::delete("public/upload/property/".$i);
						}
					}
					foreach ($file as $rows) {
						$nameFile  = $rows->getClientOriginalName();
						if (File::exists("public/upload/property/".$nameFile)) {
							$nameFile = $nameFile."-".str_ramdom(5);
						}
						File::move($rows,"public/upload/property/".$nameFile);
						array_push($arr_img, $nameFile);
					}
					$c_img = json_encode($arr_img);
					DB::table("tbl_property")->where("pk_property_id","=",$id)->update([
						"c_img"=>$c_img
					]);
				
				}
				$c_name = $request->c_name;
				$tang = $request->tang;
				$phong = $request->phong;
				$c_caption = $request->c_caption;
				$fk_tower_id = $request->fk_tower_id;
				DB::table("tbl_property")->where("pk_property_id","=",$id)->update([
						"c_name"=>$c_name,
						"c_caption"=>$c_caption,
						"fk_tower_id"=>$fk_tower_id,
						"tang"=>$tang,
						"phong"=>$phong
					]);
				return redirect(url('admin/property?reply=did'));
				break;
		}
	}
	public function delete_property($id){
		$img = DB::table("tbl_property")->where("pk_property_id","=",$id)->first();
		if (File::exists("public/upload/property/".$img->c_img)) {
			File::delete("public/upload/property/".$img->c_img);
		}
		DB::table("tbl_property")->where("pk_property_id","=",$id)->delete();
		return redirect(url('admin/property'));
	}
}