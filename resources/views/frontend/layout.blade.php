<!DOCTYPE html>
<html>
<head>
	<title>{{ $title->c_content }}</title>
	<!-- icon-favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicons/favicon.ico">
	<link rel="manifest" href="assets/images/favicons/manifest.html">
	<link rel="mask-icon" href="assets/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
	<meta charset="utf-8">
	<?php foreach ($meta as $rows): ?>
		<meta name="{{ $rows->c_name }}" content="{{ $rows->c_content }}">
	<?php endforeach ?>

	<meta name="msapplication-TileImage" content="assets/images/favicons/mstile-150x150.png">
	<meta name="theme-color" content="#ffffff">
	<?php $uri = $_SERVER['REQUEST_URI'];
		$arr = explode("/", $uri);
		$v_global = 0; 
		foreach ($arr as $rows) {
			if ($rows=="lien-he"||$rows=="tin-tuc"||$rows=="gallery-florence-my-dinh") {
				$v_global=1;

			}

		}
	 ?>

	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600" rel="stylesheet">
	<!-- Styel link css -->

	<link href="{{ asset('public/frontend/assets/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<!-- Template specific stylesheets-->

	<link href="{{ asset('public/frontend/assets/lib/loaders.css/loaders.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/assets/lib/iconsmind/iconsmind.css') }}" rel="stylesheet">

	<link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

	<link href="{{ asset('public/frontend/assets/lib/hamburgers/dist/hamburgers.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/assets/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/assets/lib/flexslider/flexslider.css') }}" rel="stylesheet">
	<!-- OWL Caroulse -->
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/frontend/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
	<!-- OWL Caroulse -->
	<!-- Main stylesheet and color file-->
	<link href="{{ asset('public/frontend/assets/css/style.css') }}" rel="stylesheet">
	<script src="{{ asset('public/frontend/assets/lib/jquery/dist/jquery.min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/lib/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
	
   
	<!-- Styel link css -->
</head>
<body data-spy="scroll" data-target=".inner-link" data-offset="60">
	<main>
		<div id="bottom-dangky">
		<div class="container">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" style="padding: 5px">
					<div class="text-white"><b style="margin-bottom: -8px">Đăng ký nhận: Bảng giá và chính sách mới nhất về dự án</b>&nbsp;<button class="tn btn-icon btn-twitter btn-icon-left" id="open"><span class="fa fa-gitlab"></span>Đăng ký</button></div>
				</div>
				<div class="col-md-1">
					 <span class="fa fa-times" style="font-size: 25px;color: #fff;position: fixed;bottom: 10px ;right: 10px;cursor: pointer;" id="close-bt"></span>
				</div>
				<script>
					$("#close-bt").click(function(event) {
						$("#bottom-dangky").hide(1000);
					});
					$("#open").click(function(event) {
						$("#box-dangky").modal("show");
					});
				</script>
			</div>
		</div>
	</div>
	<div class="modal fade" id="box-dangky">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content ">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title Lobster text-center">Đăng ký </h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body" id="modal-content-1">
						<div class="row" style="margin-top: 10px">
							<div class="col-md-2"><label>Họ tên</label></div>
							<div class="col-md-8">
								<input type="text" id="c_name" placeholder="Họ tên" class="form-control">
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col-md-2"><label>Phone</label></div>
							<div class="col-md-8">
								<input type="number" id="c_phone" placeholder="Số điện thoại" class="form-control">
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col-md-2"><label>Email</label></div>
							<div class="col-md-8">
								<input type="text" id="c_email" placeholder="Email" class="form-control">
							</div>
							<div class="col-md-2"></div>
						</div>
						<div class="row" style="margin-top: 10px">
							<div class="col-md-2" id="error"></div>
							<div class="col-md-8">
								<button class="btn btn-success" id="btn-submit">Submit</button>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>
		<script>
			$("#btn-submit").click(function(event) {
				var c_name = $("#c_name").val();
				var c_email = $("#c_email").val();
				var c_phone = $("#c_phone").val();
				var ck = 0;
				if (c_name==""||c_email==""||c_phone=="") {
					ck=1;
				}
				if (c_email.search("@")==-1) {
					ck=1;
				}
				if (ck!=0) {
					$("#error").html("<p style='color:red'>Lỗi ! Vui lòng nhập lại</p>");
				}else{
					$("#error").html("");
					var url = $("#base_url").attr('href');
					$.ajax({
						url: url+'/contact/'+c_name+"/"+c_email+"/"+c_phone,
						type: 'get',
						dataType: 'html',
						success:function(data){
							$("#modal-content-1").html(data);
						}
					})
				}
			});
		</script>
		<div class="loading" id="preloader">
			<div class="h-100 d-flex align-items-center justify-content-center text-center">
				<div class="loader-box" style="text-align: center;">
					<br>
					<div class="loader">
					</div>
				</div>
			</div>
		</div>
		<div class="znav-container znav-white znav-freya znav-fixed" id="znav-container">
			<div class="container">
				<nav class="navbar navbar-expand-lg">
					<a class="navbar-brand overflow-hidden pr-3" href="{{ url('/') }}" id="base_url">
						<div class="background-1 radius-br-0 radius-secondary lh-1 color-white fs-0" style="padding: 7px 10px 7px 13px;"><img src="{{ asset('public/upload/logo.png') }}" width="20" alt="logo-florence-my-dinh">&nbsp; Florence tower</div>
						<!-- Incase you are using image-->
						<!-- <img src="assets/images/logo-freya.png" alt="Freya" width="70"/>-->
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<div class="hamburger hamburger--emphatic">
							<div class="hamburger-box">
								<div class="hamburger-inner">
								</div>
							</div>
						</div>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav fs-0">
							@if($v_global==0)
							<li>
								<a href="#tongquan">Tổng quan dự án</a>		
							</li>
							<li>
								<a href="#vitri">Vị trí</a>
							</li>
							<li>
								<a href="#Property">Chi tiết căn hộ</a>
							</li>
							<li>
								<a href="#tienich">Tiện ích</a>
								
							</li>
							@else
							<li>
								<a href="{{ url('/#tongquan') }}">Tổng quan dự án</a>		
							</li>
							<li>
								<a href="{{ url('/#vitri') }}">Vị trí</a>
							</li>
							<li>
								<a href="{{ url('/#Property') }}">Chi tiết căn hộ</a>
							</li>
							<li>
								<a href="{{ url('/#tienich') }}">Tiện ích</a>
								
							</li>
							@endif
							<li>
								<a href="{{ url('/gallery-florence-my-dinh') }}">Bộ sưu tập</a>
							</li>
							<li>
								<a href="{{ url('/lien-he') }}">Liên hệ</a>
							</li>
							
						</ul>
						<ul class="navbar-nav fs-0 ml-lg-auto">
							<li class="text-center">
								<a class="pl-3 pl-lg-1 d-inline-block" href="#">
									<span class="fa fa-facebook">
									</span>
								</a>
								<a class="pl-3 pl-lg-1 d-inline-block" href="#">
									<span class="fa fa-twitter">
									</span>
								</a>
								<a class="pl-3 pl-lg-1 d-inline-block" href="#">
									<span class="fa fa-instagram">
									</span>
								</a>
								<a class="pl-3 pl-lg-1 d-inline-block pr-0" href="#">
									<span class="fa fa-dribbble">
									</span>
								</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	<div class="container-content">
		@yield('controller')
	</div>
	
	<section class="py-4 fs-1 text-center background-9">
			<div class="container">
				<div class="row">
					<div class="col">
						<a class="d-inline-block px-2 color-3" href="#">
							<span class="fa fa-facebook">
							</span>
						</a>
						<a class="d-inline-block px-2 color-3" href="#">
							<span class="fa fa-twitter">
							</span>
						</a>
						<a class="d-inline-block px-2 color-3" href="#">
							<span class="fa fa-instagram">
							</span>
						</a>
					</div>
				</div>
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>
		<section class="text-center py-8" style="background: url({{ asset('public/upload/images/ASxcuK7Hfooter-img.png') }});">
			<div class="container">
				<div class="row justify-content-center" style="text-align: left;padding: 10px">
					<div class="col-lg-3" style="margin-bottom: 20px">
						<img src="{{ asset('public/upload/images/cY3PLl6glogo-danko1.png') }}" alt="logo-danko-group" width="100%" class="box-shadow">
					</div>
					<div class="col-lg-3 " style="margin-bottom: 20px">
						<h4 class="Lobster text-white">Thông tin liên hệ</h4>
						<br>
						<h6 class="text-white"><b>Hotline:&nbsp;</b>0123 885 9868</h6>
						<h6 class="text-white"><b>Email:&nbsp;</b>Example@mail.com</h6>
						<h6 class="text-white"><b>Website:&nbsp;</b>florencesmydinh.vn</h6>
					</div>
					<div class="col-lg-3" style="margin-bottom: 20px">
						<h4 class="Lobster text-white">Florence Mỹ Đình</h4><br>
						<h6 class="text-white"><b>Địa chỉ:&nbsp;</b>số 28 lô X3 đường Trần Hữu Dực, phường Cầu Diễn, Nam Từ Liêm, Hà Nội</h6>
						<h6 class="text-white">Quý IV/2019 Bàn giao căn hộ</h6>
					</div>
					<div class="col-lg-3" style="margin-bottom: 20px">
						<h4 class="Lobster text-white ">Theo dõi chúng tôi</h4>
						<div class="socialite">
							
						</div>
					</div>
					
				</div>
				
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>
		<div class="row" style="width: 100%;padding: 10px;position: absolute;bottom:20px">
					 <div class="col-md-4"></div>
					 <div class="col-md-4">
					 	<p class="text-white text-center">Copyright © 2018 All Rights Reserved Design by <a href="http://themewagon.com" target="_blank" style="color: rgb(0,30,200)">Themewagon</a></p> 
					 </div>
					 <div class="col-md-4"></div>
		</div>
	</main>



<!-- Script - JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	@if($v_global>0)
	<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDn4C55ZPEZTc9RiF3gHGCnyq7o6Xfw_fk&callback=initMap'
    async defer></script>
    @endif

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="{{ asset('public/frontend/assets/lib/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/lib/jquery-menu-aim/jquery.menu-aim.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/lib/gsap/src/minified/TweenMax.min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/lib/gsap/src/minified/plugins/ScrollToPlugin.min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/lib/CustomEase.min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/js/config.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/lib/rellax/rellax.min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/js/zanimation.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/js/inertia.js') }}"></script>
<!-- Script - JS -->
	
	<script src="{{ asset('public/frontend/assets/lib/flexslider/jquery.flexslider-min.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/js/core.js') }}"></script>
	<script src="{{ asset('public/frontend/assets/js/main.js') }}"></script>
	
</body>
</html>