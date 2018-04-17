<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ajaxController extends Controller
{
  	public function view_property($id){
  		$arr = explode("-", $id);
  		$property = ["tang"=>$arr[0],"toa"=>$arr[1],"sophong"=>$arr[2]];
  		switch ($property["tang"]) {
  			case 'mb5A16':
  				$tang = "%"."05,06,07,08,09,10,11,12,13,14,15,16"."%";
  				$fk_tower_id = $property["toa"]=="r1"?1:2;
  				$p = DB::table("tbl_property")->where("fk_tower_id","=",$fk_tower_id)->where("phong","=",$property["sophong"])->where("tang","like",$tang)->first();
  				
  				break;
  			case 'mb18A22':
  				$tang = "%"."17,18,19,20,21,22"."%";
  				$fk_tower_id = $property["toa"]=="r1"?1:2;
  				$p = DB::table("tbl_property")->where("fk_tower_id","=",$fk_tower_id)->where("phong","=",$property["sophong"])->where("tang","like",$tang)->first();
  				
  				 break;
  			case 'mb25':
  				$tang = "%"."23"."%";
  				$fk_tower_id = $property["toa"]=="r1"?1:2;
  				$p = DB::table("tbl_property")->where("fk_tower_id","=",$fk_tower_id)->where("phong","=",$property["sophong"])->where("tang","like",$tang)->first();
  				
  				 break;
  				break;
			case 'mb24':
			  	$tang = "%"."24"."%";
  				$fk_tower_id = $property["toa"]=="r1"?1:2;
  				$p = DB::table("tbl_property")->where("fk_tower_id","=",$fk_tower_id)->where("phong","=",$property["sophong"])->where("tang","like",$tang)->first();
  				 break;		
			  	break;

  		}
  		$tower = DB::table("tower")->where("pk_tower_id","=",$p->fk_tower_id)->first();
  		echo "<div class='row'><div class='col-md-4'></div><div class='col-md-4 text-center' id='title_modal'><h4 class='Lobster'>Tòa tháp ".$tower->c_name." ".$p->c_name."</h4></div><div class='col-md-4'></div></div>";
		echo "<div class='row'><div class='col-md-2'></div><div class='col-md-8 text-center' id='caption_modal'>".$p->c_caption."</div><div class='col-md-2'></div></div>";
		$src="http://localhost/icidcomplex/public/upload/property/".json_decode($p->c_img)[0];
		echo "<div class='row'><div class='col-md-12' id='img_modal'><img src='$src' alt = ></div></div>";

  	}
    public function contact($name,$email,$phone){
      DB::table('inbox')->insert([
        "c_name"=>$name,
        "c_email"=>$email,
        "c_phone"=>$phone,
        "c_message"=>"Tai tai lieu",
        "status"=>0
      ]);
      echo "Cảm ơn quý khách đã đăng ký ! ";
      echo "";
    }
}
