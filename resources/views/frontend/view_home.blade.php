@extends('frontend.layout')
@section('controller')

<!-- Slider -->
		<input type="hidden" value="{{ asset('public/upload/property/') }}" id="src" readonly="">
		<div class="flexslider flexslider-simple h-full loading parallax">
			<ul class="slides">
			<?php foreach ($slider as $rows): ?>
				<li data-zanim-timeline="{}">
					<section class="py-0 color-white">
						<div class="background-holder overlay overlay-freya" style="background-image:url(<?php echo asset('public/upload/slider/'.$rows->c_img) ?>);">
						</div>
						<!--/.background-holder-->
						<div class="container">
							<div class="row justify-content-start align-items-end pt-11 pb-6 h-full" data-zanim-timeline="{}">
								<div class="col pb-lg-0">
									<div class="row align-items-end parallax" data-rellax-speed="2">
										<div class="col-lg">
											<div class="overflow-hidden">

												<p class="mb-1 text-uppercase ls" data-zanim='{"from":{"opacity":0,"x":-10},"to":{"opacity":1,"x":0},"delay":0.1}' style="text-transform: uppercase;"><?php echo $rows->c_caption; ?></p>
											</div>
											<div class="overflow-hidden">
												<h2 class="color-white fw-500 mb-4 mb-lg-0 " data-zanim='{"from":{"opacity":0,"x":-10},"to":{"opacity":1,"x":0},"delay":0}'>{{ $rows->alt }}</h2>
											</div>
										</div>
										<div class="col text-lg-right">
											<div class="overflow-hidden">
												<div data-zanim='{"from":{"opacity":0,"x":-10},"to":{"opacity":1,"x":0},"delay":0.2}'>
													<a class="btn btn-sm btn-outline-white" href="skype:some_skype_user?chat"><i class="ion-ios-telephone">&nbsp;</i>0123 88 59 868</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/.row-->
						</div>
						<!--/.container-->
					</section>
				</li>
			<?php endforeach ?>
			</ul>
		</div>
<!-- Slider -->
<!-- Text -->
		<section class="text-center background-white" style="margin-top: 70px">
			<div class="container" >
				<div class="row justify-content-center">
					<div class="col-md-10 col-lg-8">
						<h3 id="txt-florence" style="background: url({{ asset('public/upload/images/oTLdfPA8hv01.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: contain;padding: 70px 0px;color: #6a423ce3">Florence Mỹ Đình</h3>
						
						<p class="mb-7">Lấy cảm hứng từ hình tượng hoa diên vĩ, loại hoa mang lại niềm may mắn – biểu tượng cho thành phố Florence. Florence mở ra một phong cách sống mới mà bạn hằng mong ước bất lâu: Một cuộc sống trong lành, ngập tràn những xúc cảm tương mới và trải nghiệm cân bằng, thư thái; Một vùng đất an lành, may mắn, chờ đón bạn trở về mỗi ngày. <br>
						<b><i class="ion-happy-outline" style="color: red;"></i>&nbsp;Florence - Chào mừng bạn trở về nhà</b></p>
					</div>
				</div>
				<div class="row" style="margin-top: -50px">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<button class="btn btn-success"><i class="ion-ios-redo" style="color: white;"></i>&nbsp;Nhận trọn bộ <br>thông tin mới nhất</button>
					</div>
					<div class="col-md-4"></div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="caption" style="text-align: center;padding: 10px 50px;border-radius: 10px;box-shadow: 0px 3px 10px #847b7b">
							<h5 class="Lobster">Quý Khách Vui Lòng Gọi Để Được Tư Vấn Hoặc Đi Xem Nhà Mẫu </h5>
							<h4 style="color: #ff7675" class="Lobster"><i class="ion-ios-telephone"></i>LIÊN HỆ : <b>0987906603</b></h4>
							<button class="btn btn-danger"><i class="ion-ios-flame" style="color: white;"></i>&nbsp;<a href="#dangky" class="text-white">Đăng ký</a></button>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
				<img src="{{ asset('public/upload/images/15bj14Zrhv08.png') }}" alt="" id="flower" width="300px" height="100px" style="margin-top: -5px">
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>
		<section class="text-center" id="tongquan">
			<div class="container box-shadow" style="border-radius: 10px;padding: 10px;background: #fff;">
				<div class="row" >
					<div class="col-md-6">
						<h3 class="mb-4 title-h3" style="background: url({{ asset('public/upload/images/82LR3dCNhv06.png') }});background-position: center bottom;background-repeat: no-repeat;padding: 50px 0px">Thông tin dự án</h3>
						<div class="content">
							<?php echo $duan->c_content; ?>
						</div>
					</div>
					<div class="col-md-6" >
						<h3 class="mb-4 title-h3" style="text-align: center;background: url({{ asset('public/upload/images/82LR3dCNhv06.png') }});background-position: center bottom;background-repeat: no-repeat;padding: 50px 0px">Chính sách</h3>
						<div class="content">
							<?php echo $duan->chinh_sach; ?>
						</div>
					</div>
				</div>
				<div class="row" style="width: 100%;height: 50px;">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<img src="{{ asset('public/upload/images/nlauaxo0hv04.png') }}" width="100%" alt="Florence-My-Dinh" height="60px">
					</div>
					<div class="col-sm-2"></div>
				</div>
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>
		<!-- Follow  TL -->
		<section class="py-8 overflow-hidden text-center" id="dangky">
			<div class="background-holder overlay overlay-1 parallax" style="background-image:url({{ asset('public/upload/images/iIIrWQsmphoi-canh-dem-san-vuon-florence.jpg') }});" data-rellax-percentage="0.5">
			</div>
			<!--/.background-holder-->
			<div class="container">
				<div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll">
					<div class="col-md-1"></div>
					<div class="col-md-10"><h4 data-zanim='{"delay":0}' style="color: #FFCC00;" class="text-uppercase">
						RA MẮT DỰ ÁN Florence Mỹ Đình. <br> LIÊN HỆ NGAY: 0987906603
					</h4>
					<h5 class="Lobster text-white">Hỗ trợ vay 70% giá trị căn hộ (trong 20 năm) - Lãi suất 0% đến khi nhận nhà.</h5><br>
				</div>
					<div class="col-md-1"></div>
				</div>
				<form method="post" action="">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll" >
					<div class="col-md-3" style="margin-bottom: 10px ">
						<input type="text" name="c_name" placeholder="Họ tên" class="form-control" style="font-family: 'Lobster', cursive;" required="" data-zanim='{"delay":0.1}'>
					</div>
					<div class="col-md-3" style="margin-bottom: 10px " >
						<input type="Email" name="c_email" placeholder="Email" class="form-control" style="font-family: 'Lobster', cursive;" required="" data-zanim='{"delay":0.1}'>
					</div>
					<div class="col-md-3" style="margin-bottom: 10px ">
						<input type="number" name="c_phone" placeholder="Phone" class="form-control" style="font-family: 'Lobster', cursive;" required="" data-zanim='{"delay":0.1}'>
					</div>
					<div class="col-md-3" style="margin-bottom: 10px ">
						<button class="btn btn-warning" type="submit" style="font-family: 'Lobster', cursive;" data-zanim='{"delay":0.1}'>Đăng ký</button>
					</div>
				</div>
			</form>
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>
		<!-- Follow  TL./ -->
<!-- Vi tri -->
	<section id="vitri" class="background-white">
		<div class="container">
			<div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll">
			<div class="col-md-4"></div>
			<div class="col-md-4"><h3 data-zanim='{"delay":0}' style="color: #6a423ce3;text-align: center;font-family:'Lobster', cursive;background-image: url({{ asset('public/upload/images/gbSmJ1nJflorence.1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: contain;padding: 40px 0px; ">
				Vị trí đắc địa
			</h3></div>
			<div class="col-md-3"></div>
		</div>
		<div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll">
			<div class="col-md-4" style="padding: 10px 50px">
				<b style="font-family:'Lobster',cursive;font-size:22px;color:#6a423ce3;" data-zanim='{"delay":0}' >Florence Tower</b>
				 <br>&nbsp;<p data-zanim='{"delay":0.1}'>Nằm tại số 28 Trần Hữu Dực - tuyến phố đẹp và phát triển bậc nhất của Mỹ Đình, Nam Từ Liêm, Hà Nội, một vị trí được coi là vô cùng hoàn hảo: nằm cách đường Hồ Tùng Mậu chưa đến 300m, liên kết các tuyến đường giao thông quan trọng Vành đai 3, Lê Đức Thọ, dễ dàng kết nối với các khu vực phát triển khác của thủ đô Hà Nội.</p> 
				 <p data-zanim='{"delay":0.2}'>Với lợi thế tiếp giáp quận Nam Từ Liêm, khu vực phát triển dịch vụ giáo dục với số lượng lớn nhất Hà Nội, từ công trình có thể dễ dàng tiếp cận các trường chất lượng cao các cập, tiêu biểu có trường liên cấp Đoàn Thị Điểm, trường chất lượng cao Lê Qúy Đôn, trường Trung học Marie Curie, trường liên cấp quốc tế Olympia...</p>
				<br>
				<hr data-zanim='{"delay":0.3}'>
				<p data-zanim='{"delay":0.3}'>Thu hút được một cộng đồng dân trí cao, Florence Tower tạo nên giá trị bền vững về văn hóa, xã hội và giáo dục, góp phần gia tăng giá trị tích lũy cho bất động sản trong khu vực.</p>

			</div>
			<div class="col-md-8">
				<img src="{{ asset('public/upload/images/QhAXMpQlvi-tri.png') }}" alt="vi-tri-dac-dia-florence" width="100%" class="box-shadow" style="margin:60px 0px;">
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div data-options='{"nav":true,"lazyLoad":true,"dots":false,"loop":true,"autoplay":true,"autoplayHoverPause":true,"items":3,"dots":true}' class="owl-carousel owl-theme owl-nav-outer owl-dot-round">
					<div class="item"><h3 class="radius-primary">SVD MY DINH</h3></div>
					<div class="item"><h3 class="radius-primary">SVD MY DINH</h3></div>
					<div class="item"><h3 class="radius-primary">SVD MY DINH</h3></div>
					<div class="item"><h3 class="radius-primary">SVD MY DINH</h3></div>
					<div class="item"><h3 class="radius-primary">SVD MY DINH</h3></div>
					<div class="item"><h3 class="radius-primary">SVD MY DINH</h3></div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		</div>

	</section>

	<!-- Vi tri -->





		<!-- Property -->
		



		<section id="Property" class="overflow-hidden text-center">
			<div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll" id="title-property">
					<div class="col-md-4"></div>
					<div class="col-md-4"><h3 data-zanim='{"delay":0}' style="color: #6a423ce3;text-align: center;font-family:'Lobster', cursive;background-image: url({{ asset('public/upload/images/gbSmJ1nJflorence.1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: contain;padding: 40px 0px; ">
						Chi tiết các căn hộ
					</h3>
					<i style="font-size: 24px">(Click để xem chi tiết)</i></div>
					<div class="col-md-4"></div>
			</div>
			<div class="row" id="btn-tang">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<p id="m1" class="btn btn-outline-info ">Tầng 1</p>
					<p id="m2" class="btn btn-outline-info ">Tầng 2</p>
					<p id="m3" class="btn btn-outline-info ">Tầng 3</p>
					<p id="m416" class="btn btn-outline-info active">Tầng 5A-16</p>
					<p id="m1722" class="btn btn-outline-info">Tầng 18A-22</p>
					<p id="m23" class="btn btn-outline-info">Tầng 25A</p>
					<p id="m24" class="btn btn-outline-info">Tầng 25B</p>
				</div>
				<div class="col-md-2"></div>
			</div>
			<div class="row" id="btn-img">
				<div class="col-md-1"></div>
				<div class="col-md-10 " id="img-property" style="background: #fff">
					<img src="{{ asset('public/upload/images/z6IwK1ERmb5-16.jpg') }}" alt="chi-tiet-can-ho-tang-4-16" id="mb5A16" >
				</div>
				<div class="col-md-1"></div>
				<script>

					$("#m1").click(function(event) {
						$(this).addClass('active');
						$("#m2").removeClass('active');
						$("#m3").removeClass('active');
						$("#m1722").removeClass('active');
						$("#m23").removeClass('active');
						$("#m24").removeClass('active');

						$("#img-property").html("");
						$("#img-property").append("<img src=<?php echo asset('public/upload/images/hUE6swyPMBtang1.png') ?> alt='chi-tiet-can-ho-tang-1' width='100%'   >");
						$(".m416").css('display', 'none');
						$(".m1722").css('display', 'none');
						$(".m23").css('display', 'none');
						$(".m24").css('display', 'none');
					});
					$("#m2").click(function(event) {
						$(this).addClass('active');
						$("#m1").removeClass('active');
						$("#m3").removeClass('active');
						$("#m1722").removeClass('active');
						$("#m23").removeClass('active');
						$("#m24").removeClass('active');

						$("#img-property").html("");
						$("#img-property").append("<img src=<?php echo asset('public/upload/images/I7EqGDr2MBtang2.png') ?> alt='chi-tiet-can-ho-tang-2' width='100%'   >");
						$(".m416").css('display', 'none');
						$(".m1722").css('display', 'none');
						$(".m23").css('display', 'none');
						$(".m24").css('display', 'none');
					});
					$("#m3").click(function(event) {
						$(this).addClass('active');
						$("#m1").removeClass('active');
						$("#m2").removeClass('active');
						$("#m1722").removeClass('active');
						$("#m23").removeClass('active');
						$("#m24").removeClass('active');

						$("#img-property").html("");
						$("#img-property").append("<img src=<?php echo asset('public/upload/images/3EAZ5UNqMBtang3.png') ?> alt='chi-tiet-can-ho-tang-3' width='100%'  id='mb2' >");
						$(".m416").css('display', 'none');
						$(".m1722").css('display', 'none');
						$(".m23").css('display', 'none');
						$(".m24").css('display', 'none');
					});

					$("#m416").click(function(event) {
						$(this).addClass('active');
						$("#m1").removeClass('active');
						$("#m2").removeClass('active');
						$("#m3").removeClass('active');
						$("#m1722").removeClass('active');
						$("#m23").removeClass('active');
						$("#m24").removeClass('active');

						$("#img-property").html("");
						$("#img-property").append("<img src=<?php echo asset('public/upload/images/z6IwK1ERmb5-16.jpg') ?> alt='chi-tiet-can-ho-tang-4-16' width='100%'  id='mb5A16' >");
						$(".m416").css('display', 'block');
						$(".m1722").css('display', 'none');
						$(".m23").css('display', 'none');
						$(".m24").css('display', 'none');
					});
					$("#m1722").click(function(event) {
						$(this).addClass('active');
						$("#m1").removeClass('active');
						$("#m2").removeClass('active');
						$("#m3").removeClass('active');
						$("#m416").removeClass('active');
						$("#m23").removeClass('active');
						$("#m24").removeClass('active');

						$("#img-property").html("");
						$("#img-property").append("<img src=<?php echo asset('public/upload/images/yVEeptazmb18A-22.jpg') ?> alt='chi-tiet-can-ho-tang-7-22' width='100%' id='mb18A22' >");

						$(".m1722").css('display', 'block');
						$(".m416").css('display', 'none');
						$(".m23").css('display', 'none');
						$(".m24").css('display', 'none');
					});
					$("#m23").click(function(event) {
						$(this).addClass('active');
						$("#m1").removeClass('active');
						$("#m2").removeClass('active');
						$("#m3").removeClass('active');
						$("#m416").removeClass('active');
						$("#m1722").removeClass('active');
						$("#m24").removeClass('active');

						$("#img-property").html("");
						$("#img-property").append("<img src=<?php echo asset('public/upload/images/o0c7yp6nmb25.jpg') ?> alt='chi-tiet-can-ho-tang-23' width='100%'  id='mb25' >");

						$(".m1722").css('display', 'none');
						$(".m416").css('display', 'none');
						$(".m23").css('display', 'block');
						$(".m24").css('display', 'none');
					});
					$("#m24").click(function(event) {
						$(this).addClass('active');
						$("#m1").removeClass('active');
						$("#m2").removeClass('active');
						$("#m3").removeClass('active');
						$("#m416").removeClass('active');
						$("#m1722").removeClass('active');
						$("#m23").removeClass('active');
						$("#img-property").html("<img src=<?php echo asset('public/upload/images/ioVQN9x2mb24.jpg') ?> alt='chi-tiet-can-ho-tang-23' width='100%'  id='mb24A' >");
						$(".m1722").css('display', 'none');
						$(".m416").css('display', 'none');
						$(".m23").css('display', 'none');
						$(".m24").css('display', 'block');

					});
				</script>
			</div>
			<div class="modal fade" id="myModal">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content ">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title Lobster">Chi tiết các căn hộ Florence Mỹ Đình</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body" id="modal-content">
						
					</div>

					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>

				</div>
			</div>
		</div>
			<!-- div -->
	<script>
		function property_f(id){
			var base_url = $("#base_url").attr('href');
			$.ajax({
				url: base_url+'/ajax/property_profile/'+id,
				type: 'get',
				dataType: 'html',
				data: {"id": id},
				success:function(data){
					
					$("#modal-content").html(data);
					$("#myModal").modal("show");
				}
			})
			
			
		}
	</script>
	<div class="map m416">
		<span id="mb5A16-r1-01" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-02" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-03" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-05" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-06" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-07" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-08" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-09" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-10" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-11" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-12" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r1-15" onclick="property_f(this.id)"></span>

		<span id="mb5A16-r2-01" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-02" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-03" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-05" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-06" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-07" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-08" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-09" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-10" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-11" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-12" onclick="property_f(this.id)"></span>
		<span id="mb5A16-r2-15" onclick="property_f(this.id)"></span>
	</div>
	<div class="map m1722" style="display: none;">
		<span id="mb18A22-r1-01" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-02" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-03" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-05" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-06" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-07" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-08" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-09" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-10" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-11" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-12" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r1-15" onclick="property_f(this.id)"></span>

		<span id="mb18A22-r2-01" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-02" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-03" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-05" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-06" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-07" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-08" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-09" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-10" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-11" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-12" onclick="property_f(this.id)"></span>
		<span id="mb18A22-r2-15" onclick="property_f(this.id)"></span>
	</div>
	<div class="map m23" style="display: none;">
		<span id="mb25-r1-01" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-02" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-03" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-05" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-06" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-07" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-08" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-09" onclick="property_f(this.id)"></span>
		<span id="mb25-r1-10" onclick="property_f(this.id)"></span>
		
		<span id="mb25-r2-01" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-02" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-03" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-05" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-06" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-07" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-08" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-09" onclick="property_f(this.id)"></span>
		<span id="mb25-r2-10" onclick="property_f(this.id)"></span>
	</div>
	<div class="map m24" style="display: none;">
		<span id="mb24-r1-01" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-02" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-03" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-05" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-06" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-07" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-08" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-09" onclick="property_f(this.id)"></span>
		<span id="mb24-r1-10" onclick="property_f(this.id)"></span>
		
		<span id="mb24-r2-01" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-02" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-03" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-05" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-06" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-07" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-08" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-09" onclick="property_f(this.id)"></span>
		<span id="mb24-r2-10" onclick="property_f(this.id)"></span>
	</div>
	<script>
		// R1-mb25
		function responsive(x,y,w,h){
			var perW = $("#img-property").width()/1280;
			var perH = $("#img-property").height()/1500;
			var width = w-x;
			var height = h-y;
			var addW = ($("#Property").width()-$("#img-property").width())/2;
			if ($('body').width()<=750) {
			var addH = $("#btn-tang").height()+32+32+$("#title-property").height();
			}else{
			var addH = $("#btn-tang").height()+32+$("#title-property").height();
			}
			var css = {
				"left":x*perW+addW,
				"top":y*perH+addH,
				"width":width*perW,
				"height":height*perH
			}
			return css;
		}
		
// mat bang tang 25 -end ================
// mat bang tang5-16
		jQuery(document).ready(function($) {
			$("#mb5A16-r1-01").css(responsive(694,969,814,1111));
		$("#mb5A16-r1-02").css(responsive(819,969,954,1112));
		$("#mb5A16-r1-03").css(responsive(958,969,1128,1112));
		$("#mb5A16-r1-05").css(responsive(955,1142,1125,1285));
		$("#mb5A16-r1-06").css(responsive(819,1140,958,1284));
		$("#mb5A16-r1-07").css(responsive(681,1139,820,1283));
		$("#mb5A16-r1-08").css(responsive(541,1140,680,1284));
		$("#mb5A16-r1-09").css(responsive(365,1142,537,1282));
		$("#mb5A16-r1-10").css(responsive(362,970,534,1110));
		$("#mb5A16-r1-11").css(responsive(438,823,596,948));
		$("#mb5A16-r1-12").css(responsive(438,699,596,824));
		$("#mb5A16-r1-15").css(responsive(626,823,784,948));

		$("#mb5A16-r2-01").css(responsive(393,405,534,546));
		$("#mb5A16-r2-02").css(responsive(254,406,395,547));
		$("#mb5A16-r2-03").css(responsive(82,406,254,549));
		$("#mb5A16-r2-05").css(responsive(83,235,255,378));
		$("#mb5A16-r2-06").css(responsive(254,232,400,378));
		$("#mb5A16-r2-07").css(responsive(396,232,542,378));
		$("#mb5A16-r2-08").css(responsive(538,233,678,378));
		$("#mb5A16-r2-09").css(responsive(679,233,847,380));
		$("#mb5A16-r2-10").css(responsive(694,406,852,550));
		$("#mb5A16-r2-11").css(responsive(629,572,782,696));
		$("#mb5A16-r2-12").css(responsive(629,695,782,819));
		$("#mb5A16-r2-15").css(responsive(439,570,592,694));
		// mat bang tang 23
		$("#mb25-r1-01").css(responsive(719,974,842,1118));
		
		$("#mb25-r1-02").css(responsive(847,976,980,1121));
		
		$("#mb25-r1-03").css(responsive(988,974,1161,1120));
		
		$("#mb25-r1-05").css(responsive(986,1149,1159,1295));
		
		$("#mb25-r1-06").css(responsive(847,1148,984,1297));
		
		$("#mb25-r1-07").css(responsive(704,1149,841,1298));
		
		$("#mb25-r1-08").css(responsive(563,1150,700,1299));
		
		$("#mb25-r1-09").css(responsive(390,1151,561,1297));
		$("#mb25-r1-10").css(responsive(387,974,558,1120));

		// r2
		$("#mb25-r2-01").css(responsive(421,403,558,546));
		$("#mb25-r2-02").css(responsive(278,403,415,546));
		$("#mb25-r2-03").css(responsive(107,399,277,547));
		$("#mb25-r2-05").css(responsive(107,229,277,377));
		$("#mb25-r2-06").css(responsive(279,226,420,373));
		$("#mb25-r2-07").css(responsive(418,226,559,373));
		$("#mb25-r2-08").css(responsive(559,227,700,374));
		$("#mb25-r2-09").css(responsive(700,230,875,372));
		$("#mb25-r2-10").css(responsive(716,402,876,548));
// mat bang tang 18A-22
		$("#mb18A22-r1-01").css(responsive(681,952,812,1100));
		$("#mb18A22-r1-02").css(responsive(815,952,950,1099));
		$("#mb18A22-r1-03").css(responsive(952,951,1128,1101));
		$("#mb18A22-r1-05").css(responsive(954,1126,1130,1276));
		$("#mb18A22-r1-06").css(responsive(744,1128,953,1277));
		
		$("#mb18A22-r1-08").css(responsive(532,1127,741,1276));
		$("#mb18A22-r1-09").css(responsive(354,1125,532,1276));
		$("#mb18A22-r1-10").css(responsive(345,949,523,1100));
		$("#mb18A22-r1-11").css(responsive(426,804,590,928));
		$("#mb18A22-r1-12").css(responsive(425,678,589,802));
		$("#mb18A22-r1-15").css(responsive(615,806,779,930));

		$("#mb18A22-r2-01").css(responsive(383,382,522,523));
		$("#mb18A22-r2-02").css(responsive(245,383,384,524));
		$("#mb18A22-r2-03").css(responsive(70,378,243,527));
		$("#mb18A22-r2-05").css(responsive(69,207,242,356));
		$("#mb18A22-r2-06").css(responsive(242,205,459,352));
		
		$("#mb18A22-r2-08").css(responsive(455,205,672,352));
		$("#mb18A22-r2-09").css(responsive(670,206,843,350));
		$("#mb18A22-r2-10").css(responsive(682,381,845,527));
		$("#mb18A22-r2-11").css(responsive(618,545,777,676));
		$("#mb18A22-r2-12").css(responsive(619,671,778,802));
		$("#mb18A22-r2-15").css(responsive(428,547,587,678));

		$("#mb24-r1-01").css(responsive(817,960,907,1118));
		$("#mb24-r1-02").css(responsive(907,963,1007,1117));
		
		$("#mb24-r1-03").css(responsive(1008,966,1135,1118));
		
		$("#mb24-r1-05").css(responsive(1010,1149,1137,1301));
		
		$("#mb24-r1-06").css(responsive(908,1148,1008,1301));
		
		$("#mb24-r1-07").css(responsive(809,1147,909,1300));
		
		$("#mb24-r1-08").css(responsive(706,1146,806,1299));
		
		$("#mb24-r1-09").css(responsive(582,1149,702,1302));
		$("#mb24-r1-10").css(responsive(583,965,703,1118));

		// r2
		$("#mb24-r2-01").css(responsive(605,362,703,511));
		$("#mb24-r2-02").css(responsive(506,361,604,510));
		$("#mb24-r2-03").css(responsive(378,357,504,512));
		$("#mb24-r2-05").css(responsive(380,176,506,331));
		$("#mb24-r2-06").css(responsive(502,173,604,328));
		$("#mb24-r2-07").css(responsive(606,173,708,328));
		$("#mb24-r2-08").css(responsive(704,174,806,329));
		$("#mb24-r2-09").css(responsive(808,172,932,331));
		$("#mb24-r2-10").css(responsive(819,358,929,517));
		
		});
		
		$(window).resize(function(event) {
			$("#mb5A16-r1-01").css(responsive(694,969,814,1111));
		$("#mb5A16-r1-02").css(responsive(819,969,954,1112));
		$("#mb5A16-r1-03").css(responsive(958,969,1128,1112));
		$("#mb5A16-r1-05").css(responsive(955,1142,1125,1285));
		$("#mb5A16-r1-06").css(responsive(819,1140,958,1284));
		$("#mb5A16-r1-07").css(responsive(681,1139,820,1283));
		$("#mb5A16-r1-08").css(responsive(541,1140,680,1284));
		$("#mb5A16-r1-09").css(responsive(365,1142,537,1282));
		$("#mb5A16-r1-10").css(responsive(362,970,534,1110));
		$("#mb5A16-r1-11").css(responsive(438,823,596,948));
		$("#mb5A16-r1-12").css(responsive(438,699,596,824));
		$("#mb5A16-r1-15").css(responsive(626,823,784,948));

		$("#mb5A16-r2-01").css(responsive(393,405,534,546));
		$("#mb5A16-r2-02").css(responsive(254,406,395,547));
		$("#mb5A16-r2-03").css(responsive(82,406,254,549));
		$("#mb5A16-r2-05").css(responsive(83,235,255,378));
		$("#mb5A16-r2-06").css(responsive(254,232,400,378));
		$("#mb5A16-r2-07").css(responsive(396,232,542,378));
		$("#mb5A16-r2-08").css(responsive(538,233,678,378));
		$("#mb5A16-r2-09").css(responsive(679,233,847,380));
		$("#mb5A16-r2-10").css(responsive(694,406,852,550));
		$("#mb5A16-r2-11").css(responsive(629,572,782,696));
		$("#mb5A16-r2-12").css(responsive(629,695,782,819));
		$("#mb5A16-r2-15").css(responsive(439,570,592,694));

		$("#mb25-r1-01").css(responsive(719,974,842,1118));
		
		$("#mb25-r1-02").css(responsive(847,976,980,1121));
		
		$("#mb25-r1-03").css(responsive(988,974,1161,1120));
		
		$("#mb25-r1-05").css(responsive(986,1149,1159,1295));
		
		$("#mb25-r1-06").css(responsive(847,1148,984,1297));
		
		$("#mb25-r1-07").css(responsive(704,1149,841,1298));
		
		$("#mb25-r1-08").css(responsive(563,1150,700,1299));
		
		$("#mb25-r1-09").css(responsive(390,1151,561,1297));
		$("#mb25-r1-10").css(responsive(387,974,558,1120));

		// r2
		$("#mb25-r2-01").css(responsive(421,403,558,546));
		$("#mb25-r2-02").css(responsive(278,403,415,546));
		$("#mb25-r2-03").css(responsive(107,399,277,547));
		$("#mb25-r2-05").css(responsive(107,229,277,377));
		$("#mb25-r2-06").css(responsive(279,226,420,373));
		$("#mb25-r2-07").css(responsive(418,226,559,373));
		$("#mb25-r2-08").css(responsive(559,227,700,374));
		$("#mb25-r2-09").css(responsive(700,230,875,372));
		$("#mb25-r2-10").css(responsive(716,402,876,548));

		$("#mb18A22-r1-01").css(responsive(681,952,812,1100));
		$("#mb18A22-r1-02").css(responsive(815,952,950,1099));
		$("#mb18A22-r1-03").css(responsive(952,951,1128,1101));
		$("#mb18A22-r1-05").css(responsive(954,1126,1130,1276));
		$("#mb18A22-r1-06").css(responsive(744,1128,953,1277));
		
		$("#mb18A22-r1-08").css(responsive(532,1127,741,1276));
		$("#mb18A22-r1-09").css(responsive(354,1125,532,1276));
		$("#mb18A22-r1-10").css(responsive(345,949,523,1100));
		$("#mb18A22-r1-11").css(responsive(426,804,590,928));
		$("#mb18A22-r1-12").css(responsive(425,678,589,802));
		$("#mb18A22-r1-15").css(responsive(615,806,779,930));

		$("#mb18A22-r2-01").css(responsive(383,382,522,523));
		$("#mb18A22-r2-02").css(responsive(245,383,384,524));
		$("#mb18A22-r2-03").css(responsive(70,378,243,527));
		$("#mb18A22-r2-05").css(responsive(69,207,242,356));
		$("#mb18A22-r2-06").css(responsive(242,205,459,352));
		
		$("#mb18A22-r2-08").css(responsive(455,205,672,352));
		$("#mb18A22-r2-09").css(responsive(670,206,843,350));
		$("#mb18A22-r2-10").css(responsive(682,381,845,527));
		$("#mb18A22-r2-11").css(responsive(618,545,777,676));
		$("#mb18A22-r2-12").css(responsive(619,671,778,802));
		$("#mb18A22-r2-15").css(responsive(428,547,587,678));
		// mb24
		$("#mb24-r1-01").css(responsive(817,960,907,1118));
		$("#mb24-r1-02").css(responsive(907,963,1007,1117));
		
		$("#mb24-r1-03").css(responsive(1008,966,1135,1118));
		
		$("#mb24-r1-05").css(responsive(1010,1149,1137,1301));
		
		$("#mb24-r1-06").css(responsive(908,1148,1008,1301));
		
		$("#mb24-r1-07").css(responsive(809,1147,909,1300));
		
		$("#mb24-r1-08").css(responsive(706,1146,806,1299));
		
		$("#mb24-r1-09").css(responsive(582,1149,702,1302));
		$("#mb24-r1-10").css(responsive(583,965,703,1118));

		// r2
		$("#mb24-r2-01").css(responsive(605,362,703,511));
		$("#mb24-r2-02").css(responsive(506,361,604,510));
		$("#mb24-r2-03").css(responsive(378,357,504,512));
		$("#mb24-r2-05").css(responsive(380,176,506,331));
		$("#mb24-r2-06").css(responsive(502,173,604,328));
		$("#mb24-r2-07").css(responsive(606,173,708,328));
		$("#mb24-r2-08").css(responsive(704,174,806,329));
		$("#mb24-r2-09").css(responsive(808,172,932,331));
		$("#mb24-r2-10").css(responsive(819,358,929,517));
		
		});
		
		
	</script>
			<!-- div -->
		</section>
		<!-- Property -->
<!-- Text -->

<!-- Follow -2 -->
<section class="py-6 overflow-hidden text-center">
	<div class="background-holder overlay overlay-1 parallax" style="background-image:url({{ asset('public/upload/images/sH8PvN2fheader_2.jpg') }});" data-rellax-percentage="0.5">
	</div>
	<!--/.background-holder-->
	<div class="container">
		<div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll">
			<div class="col-md-6 " style="border-radius: 10px;padding: 30px 0px">
				<img src="{{ asset('public/upload/images/z2T6nF4yA037.jpg') }}" alt="Florence-tinh-hoa-kien-truc-chau-au" class="box-shadow" width="100%">
			</div>
			<div class="col-md-6">
				<div class="overflow-hidden text-center" >
					<img src="{{ asset('public/upload/logo.png') }}" alt="logo-florence-my-dinh" width="100px">
					<h3 class="text-shadow text-uppercase" style="color: white;font-weight: bold;">florence</h3>
					<p class="text-white">Tinh hoa kiến trúc châu Âu trong lòng Hà Nội</p>
				</div>
				<form action="" method="post" >
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group" >
						<div class="row">
							<div class="col-sm-2"><label class="text-white">Name</label></div>
							<div class="col-sm-8"><input type="text" name="c_name" placeholder="Họ tên" class="form-control" required=""></div>
							<div class="col-sm-2"></div>
						</div><br>
						<div class="row">
							<div class="col-sm-2"><label class="text-white">Email</label></div>
							<div class="col-sm-8"><input type="email" name="c_email" placeholder="Email" class="form-control" required=""></div>
							<div class="col-sm-2"></div>
						</div><br>
						<div class="row">
							<div class="col-sm-2"><label class="text-white">Phone</label></div>
							<div class="col-sm-8"><input type="number" name="c_phone" placeholder="Số điện thoại" class="form-control" required=""></div>
							<div class="col-sm-2"></div>
						</div><br>
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-8">
								<button class="btn btn-success" type="submit">Đăng kí</button>&nbsp;
								<button class="btn btn-danger" type="reset">Reset</button>
							</div>
							<div class="col-sm-2"></div>
						</div>

					</div>
				</form>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!--/.container-->
</section>

<?php $rep = Request::get("rep") ?>
@if($rep=="did")
	<div style="width: 250px;height: 80px;background: rgba(0,0,0,.6);position: fixed;top: 40%;
	right: 0;cursor: pointer;z-index: 3;" id="did">
		<div class="caption">
			<p style="width: 30px;height: 100%;background: green;color: white;text-align: center;">&times;</p><p style="text-align: center;color:#fff;"> Cảm ơn bạn đã đăng ký !</p>
		</div>
	</div>
	<script>
		$(".caption").click(function(event) {
			$("#did").hide(1000);
		});
	</script>
@endif
<!-- Follow -2 -->
<!-- News -->
<section id="tienich">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h3 class="text-center Lobster" data-zanim='{"delay":0}' style="color: #6a423ce3;background-image: url({{ asset('public/upload/images/gbSmJ1nJflorence.1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: contain;padding: 40px 0px; ">
				Tiện ích
			</h3>
			</div>
			<div class="col-md-4"></div>
		</div>
		<div class="row">
			<div class="col-12">
				<div data-options='{"nav":true,"lazyLoad":true,"dots":false,"loop":true,"autoplay":true,"autoplayHoverPause":true,"items":1,"dots":true}' class="owl-carousel owl-theme owl-nav-outer owl-dot-round ">
					
					<?php foreach ($service as $rows): ?>	
					<div class="item">
						<img src="{{ asset('public/upload/services/'.$rows->c_img) }}" alt="{{ $rows->c_title.'-Florence-My-Dinh' }}">
						<div class="row" style="position: absolute;width: 100%;top: 40%;padding: 30px 0px;background:rgba(0,0,0,.6);text-align: center;left: 15px">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<h3 class="Lobster text-white"><?php echo $rows->c_title; ?></h3>
								<p class="text-white" id="caption_ti"><?php echo $rows->c_caption; ?></p>
							</div>
							<div class="col-md-2"></div>
						</div>
					</div>
					
					<?php endforeach ?>
					
				</div>
			</div>
		</div>
	</div>
</section>
<div style="clear: both;"></div>

	<section id="news">
		<div class="container">
			<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<h3 class="text-center Lobster"  style="color: #6a423ce3;background-image: url({{ asset('public/upload/images/gbSmJ1nJflorence.1.png') }});background-position: center bottom;background-repeat: no-repeat;background-size: contain;padding: 40px 0px; ">
				Thông tin dự án
			</h3>
			</div>
			<div class="col-md-4"></div>
		</div>
			<div class="col-md-12">
				<div class="owl-carousel owl-theme owl-nav-outer owl-dot-round"  data-options='{"nav":true,"dots":true,"loop":true,"autoplay":true,"autoplayHoverPause":true}' id="news-slider">
					<?php foreach ($news as $rows): ?>
						<div>
						<div style="border-radius: 10px;box-shadow: 2px 2px 10px #bbb;background: url({{ asset('public/upload/news/'.$rows->c_img) }});background-size: cover;background-position: center;height: 280px;margin-right: 10px">
							<div class="media-body" style="position: absolute;background: rgba(0,0,0,.6);bottom: 0;left: 0;width: 97.5%;border-radius: 10px;padding: 5px">
								<h5 class="text-white"  >{{ $rows->c_name }}</h5>
								<?php $url_name = $url->vn_to_str($rows->c_name)."-".$rows->pk_news_id.".htm" ?>
								<a href="{{ url('/tin-tuc/'.$url_name) }}" style="color:#FF9500;float: right;">&nbsp;Xem thêm&nbsp;<i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<script>
				jQuery(document).ready(function($) {
					var size = $(window).width();
					if (size>480&&size<991) {
						$("#news-slider").attr('data-options', '{"nav":true,"dots":true,"loop":true,"autoplay":true,"autoplayHoverPause":true,"items":2}');
					}else{
						if (size<=480) {
							$("#news-slider").attr('data-options', '{"nav":true,"dots":true,"loop":true,"autoplay":true,"autoplayHoverPause":true,"items":1}');
						}
					}

				});
				
			</script>
		</div>
	</section>
<!-- News -->

@endsection