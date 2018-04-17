<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;
class ajaxController extends Controller
{
    public function delete_img($name){
    	if (File::exists('public/upload/images/'.$name)) {
    		File::delete('public/upload/images/'.$name);
    	}
    	$name = "%".$name."%";
    	DB::table("tbl_images")->where("c_img","like",$name)->delete();
    	$img = DB::table("tbl_images")->orderBy("pk_images_id","desc")->get();
    	foreach ($img as $rows) {
    		echo "<div class='col-md-3'><div id='box-img' style='width: 100%' class='btn-images'>";
			echo "<img src=".asset('public/upload/images/'.$rows->c_img)." alt='' width='100%' id='img'  data-toggle='tooltip' title='Click to delete file  !' ' >
				</div>
			</div>";
    	}
    }
}
