@extends('backend.layout')
@section("controller")
<div class="container-profile" style="background: white;padding: 20px 0px">
	
<h5 style="text-align: center;padding: 5px 0px;color: #FF646D;font-weight: bolder;">Profile Administrator</h5>
<hr>
<div id="zoom">
	<div class="momo"></div>
	<div class="img-zoom">
		<img src="{{ asset('public/upload/admin/'.$user->c_img) }}" alt="">
	</div>
</div>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4" style="text-align: center;cursor: pointer;" id="images">
		<img src="{{ asset('public/upload/admin/'.$user->c_img) }}" alt="<?php echo str_replace(".jpg", "", $user->c_img) ?>" width="200px">
	</div>
	<script>
		$("#images img").click(function(event) {
			$(".momo").addClass('active');
			$(".img-zoom").addClass('zoom');
		});
		$(".momo").click(function(event) {
			$(this).removeClass('active');
			$(".img-zoom").removeClass('zoom');
		});
	</script>
	<div class="col-md-4"></div>
</div>
<div class="row" style="text-align: center;padding: 10px 0;">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h6>  <i>{{ $user->name }}</i></h6>
		<h6>  <i>{{ $user->email }}</i></h6>
		Created at <h6>  <i>{{ $user->created_at }}</i></h6>
		Updated at <h6>  <i>{{ $user->updated_at }}</i></h6>
	</div>
	<div class="col-md-4"></div>
</div>
</div>
@endsection