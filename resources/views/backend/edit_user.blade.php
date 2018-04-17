@extends("backend.layout")
@section("controller")
	<div class="container-edit" style="background: white">
		<h4 style="padding: 5px">Edit profile</h4>
		@if(isset($err))
		<?php foreach ($err as $e): ?>
			
		<h6 style="padding: 5px;color: red;">{{ $e }}</h6>
		<?php endforeach ?>
		@endif
		<form action="" method="post" enctype="multipart/form-data" >
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2"><label><h6 style="padding: 8px 0px;">Email  : </h6></label></div>
				<div class="col-md-6"><input type="email" name="email" class="form-control" @if(isset($user->email)) readonly="" @endif value="{{ isset($user->email)?$user->email:"" }}"></div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2"><label><h6 style="padding: 8px 0px;">Name  : </h6></label></div>
				<div class="col-md-6"><input type="text" name="name" class="form-control" value="{{ isset($user->name)?$user->name:'' }}"></div>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2"><label><h6 style="padding: 8px 0px;">Password  : </h6></label></div>
				<div class="col-md-6"><input type="Password" name="password" class="form-control" id="password" onchange="check_password(this.value)" ></div>
				<div class="col-md-2" id="notice-pws"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2"><label><h6 style="padding: 8px 0px;"> Confirm password  : </h6></label></div>
				<!-- <script>
					jQuery(document).ready(function($) {
						
					});
				</script> -->
				<div class="col-md-6"><input type="password" name="confirm_password" class="form-control"  onchange="check_confirm_password(this.value)"></div>

				<script>
					
						function check_password(str){
							if (str.length <8 ) {
								$("#notice-pws").html("<h7 style='color:red'><i> * Minimum <b>8 characters</b></i></h7>")
							}else{
								$("#notice-pws").html("<i class='la la-check-circle' style='color:#4cd137;font-size:25px'></i>");
							}
						}

						function check_confirm_password(str){
							var password = $("#password").val();
							if (str!=password) {
								$("#confirm_password").html("<h7 style='color:red'><i> * Confirm password not correct !</i></h7>");
							}else{
								$("#confirm_password").html("<i class='la la-check-circle' style='color:#4cd137;font-size:25px'></i>");
							}
						}
				</script>
				<div class="col-md-2" id="confirm_password"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2"><label><h6 style="padding: 8px 0px;"> Now  </h6></label></div>
				<div class="col-md-6"><i id="time-zone"></i></div>
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
					   	var str = D+", "+M+" - "+Y+"   "+h+" : "+m+" : "+s+" GMT+7"; 
					   	$("#time-zone").html("<h7><i>"+str+"</i></h7>");
					},1000);
				</script>
				<div class="col-md-2"></div>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-2"><label><h6 style="padding: 8px 0px;">Avatar  : </h6></label></div>
				<div class="col-md-2">
					<div class="file btn btn-primary">
							Upload
							<input type="file" name="c_img" id="file" onchange="file_img()"  accept="image/x-png,image/gif,image/jpeg" />
					</div>
				</div>
				<div class="col-md-4">
					<div id="box-img">
						<img src="" alt="" id="img" width="250px">
					</div>
				</div>
				<div class="col-md-2">
				</div>
				<script>
					function file_img(){

						var tmppath = URL.createObjectURL(event.target.files[0]);
					    $("#img").fadeIn(2000).attr('src',URL.createObjectURL(event.target.files[0]));
					}
				</script>
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-6">
					<button class="btn btn-success" type="submit">@if(isset($user->email)) Edit @else Create @endif</button>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		</form>
	</div>
@endsection