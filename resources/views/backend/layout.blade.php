<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<title>Administrator - Website</title>
	<link rel="shortcut icon" href="{{ asset('public/favicon.png') }}">
	<link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/backend/css/style.css') }}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{ asset('public/backend/css/ready.css') }}">
	<link rel="stylesheet" href="{{ asset('public/backend/css/demo.css') }}">
	<script src="{{ asset('public/backend/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('public/backend/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/plugin/chartist/chartist.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<!-- 	<script src="{{ asset('public/backend/js/plugin/jquery-mapael/maps/world_countries') }}.min.js"></script>
 -->	<script src="{{ asset('public/backend/js/plugin/chart-circle/circles.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
	<script src="{{ asset('public/backend/js/ready.min.js') }}"></script>
</head>
<body>
	<div class="wrapper">
		<div id="preload">
			<div class="static">
				<img src="{{ asset('public/backend/giphy.gif') }}" alt="">
			</div>
		</div>
		<div class="main-header">
			<div class="logo-header">
				<a href="{{ url('admin') }}" class="logo" id="url">
					Ready Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" href="{{ url('admin/inbox') }}">
								<i class="la la-envelope"></i>
							
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php $s = DB::table("inbox")->where("status","=",0)->get()!=null?DB::table("inbox")->where("status","=",0)->get():"";

										$count =  count($s);
									 ?>
								<i class="la la-bell"></i>
								@if($count>0)
								<span class="notification">
									<?php echo $count; ?>
								</span>
								@endif
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have <?php echo count($s); ?> new notification</div>
								</li>
								<li>
									<div class="notif-center">
										@if(isset($s))
										<?php foreach ($s as $s): ?>
											<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													{{ $s->c_name }}
												</span>
												<span class="time">{{ $s->created_at }}</span> 
											</div>
											</a>
											
											<?php endforeach ?>
										@endif
									</div>
								</li>
								<li>
									<a class="see-all" href="{{ url('admin/inbox') }}"> <strong>See all notifications ago</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{ asset('public/upload/admin/'.Auth::user()->c_img) }}" alt="user-img" width="36" class="img-circle"><span >{{ Auth::user()->name }}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="{{ asset('public/upload/admin/'.Auth::user()->c_img) }}" alt="user"></div>
										<div class="u-text">
											<h4>{{ Auth::user()->name }}</h4>
											<p class="text-muted">{{ Auth::user()->email }}</p><a href="{{ url('admin/your-profile') }}" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ url('admin/your-profile') }}"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="{{ url('admin/inbox') }}"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ url('admin/logout') }}"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="{{ asset('public/upload/admin/'.Auth::user()->c_img) }}">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="{{ url('admin/your-profile') }}">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="{{ url('admin/edit-profile/'.Auth::user()->id) }}">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="{{ url('admin/new-account/') }}">
											<span class="link-collapse">New Account</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="{{ url('admin/du-an') }}">
								<i class="la la-dashboard"></i>
								<p>Dự án</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('admin/news') }}">
								<i class="la la-table"></i>
								<p>News</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('admin/property') }}">
								<i class="la la-keyboard-o"></i>
								<p>Apartment Property</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{url('admin/service')}}">
								<i class="la la-th"></i>
								<p>Service</p>

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          <i class="la la-bell"></i>
								<p>Images gallery</p>
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						          <a class="dropdown-item" href="{{ url('admin/images/slider') }}">Silder</a>
						          <a class="dropdown-item" href="{{ url('admin/upload-images') }}">Gallery</a>
						        </div>
						</li>
						<li class="nav-item">
							<a href="{{ url('/admin/seo') }}">
								<i class="la la-font"></i>
								<p>SEO</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="javascript:void">
								<i class="la la-fonticons"></i>
								<p>Icons</p>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
			@yield("controller")
				</div>
			</div>
		</div>
	</div>

</body>
</html>