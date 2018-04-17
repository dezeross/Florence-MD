@extends("backend.layout")
@section("controller")

<?php 
	$act = Request::get("act")!=null?Request::get("act"):"";
		$m = DB::table("tbl_tongquan")->first();
 ?>
@if($act=="edit")
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
</script>
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Title</label></div>
        			<div class="col-md-8">
        				<input type="text" name="c_name" value="{{ isset($m->c_name)?$m->c_name:'' }}" class="form-control" required="" >
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>
        	
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Content</label></div>
        			<div class="col-md-8">
        				<textarea name="c_content" id="" cols="30" rows="10" required="">
        					{{ isset($m->c_content)?$m->c_content:'' }}
        				</textarea>
        				<script>
        					CKEDITOR.replace('c_content');
        				</script>
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-2"><label>Chinh sach</label></div>
                    <div class="col-md-8">
                        <textarea name="chinh_sach" id="" cols="30" rows="10" required="">
                            {{ isset($m->chinh_sach)?$m->chinh_sach:'' }}
                        </textarea>
                        <script>
                            CKEDITOR.replace('chinh_sach');
                        </script>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        	<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"><label>Now </label></div>
        			<div class="col-md-8" id="time-zone">
        				
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>
				<div class="form-group">
        		<div class="row">
        			<div class="col-md-2"></div>
        			<div class="col-md-8">
        				<button type="submit" class="btn btn-success">Edit</button>
        			</div>
        			<div class="col-md-2"></div>
        		</div>
        	</div>	

        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endif
<?php 
	$reply = Request::get("reply")!=null?Request::get("reply"):"";
 ?>
@if($reply=="did")
<div class="alert alert-info alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert"><i class="la la-remove"></i></button>
    <strong><i class="la la-chevron-down" style="font-size: 25px"></i>&nbsp;Success!</strong>
 </div>
@endif


	<h4>Project Edit</h4>
	<p id="time-zone"></p>
	<script>
					var weekday = new Array(7);
						weekday[0] =  "Sunday";
						weekday[1] = "Monday";
						weekday[2] = "Tuesday";
						weekday[3] = "Wednesday";
						weekday[4] = "Thursday";
						weekday[5] = "Friday";
						weekday[6] = "Saturday";
						var d = new Date();
					var month = new Array();
					month[0] = "January";
					month[1] = "February";
					month[2] = "March";
					month[3] = "April";
					month[4] = "May";
					month[5] = "June";
					month[6] = "July";
					month[7] = "August";
					month[8] = "September";
					month[9] = "October";
					month[10] = "November";
					month[11] = "December";
					setInterval(function(){
						var today = new Date();
					    var h = today.getHours()<10?"0"+today.getHours():today.getHours();
					    var m = today.getMinutes()<10?"0"+today.getMinutes():today.getMinutes();
					    var s = today.getSeconds()<10?"0"+today.getSeconds():today.getSeconds();
						var D = weekday[today.getDay()];
						var M = month[today.getMonth()];
						var Y = today.getFullYear(); 
					   	var str = D+", "+M+" - "+Y+"   Time : "+h+" : "+m+" : "+s+" GMT+7"; 
					   	$("#time-zone").html("<h7><i>"+str+"</i></h7>");
					},1000);
			</script>

	<!-- table inbox -->
	<div style="background: white;">
		<div class="card-body">
			<div class="card-sub" style="padding: 5px">
				<button class="btn btn-danger" >
					<a href="{{ url('admin/du-an?act=edit') }}" style="color: white;text-decoration: none;">Edit</a>
				</button>
				<br>
				<hr>
				<h4 style="text-transform: uppercase; "><strong>dự án {{ $d->c_name }}</strong></h4>
			</div>

			<div style="background: url(<?php echo asset('public/upload/bg.jpg') ?>);overflow: hidden;position: relative;height: 1000px">
				<div style="position: absolute;top: 5px;left: 5px;color: white;z-index: 100">
					<?php echo $d->c_content; ?>
                    <h3>Chinh sach</h3>
                    <?php echo $d->chinh_sach; ?>
				</div>
				<div style="padding: 10px;color:white;background: rgba(191, 126, 102,.7);width: 1000px;height: 1000px;transform: rotate(60deg);margin-top: -100px;margin-left: -300px"></div>
			</div>

		</div>
	</div>
@endsection