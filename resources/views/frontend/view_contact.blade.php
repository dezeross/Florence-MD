@extends("frontend.layout")
@section("controller")
<section class="pt-9 background-white" >
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 col-md-10">
				<div class="text-center">
					<a class="color-7" href="#">Liên hệ<h3 class="Lobster">Florence Mỹ Đình</h3></a>
				</div>
			</div>
		</div>
		<!--/.row-->
	</div>
			<!--/.container-->
</section>
<?php $rep = Request::get('rep'); ?>
@if($rep=='did')
<section id="notify">
	<div class="container">
		<div style="width: 250px;height: 60px;position: fixed;bottom: 5px;left:5px;background:rgba(0,0,0,.6);padding:10px " class="text-justify text-center">
			<i class="fa fa-times" id="close" style="cursor: pointer;color: white"></i> 
			<p style="color: white;"><i class="fa fa-phone"></i>&nbsp;Cảm ơn quý khách đã liên hệ ! &nbsp;</p>
		</div>
	</div>
</section>
<script>
	$("#close").click(function(event) {
		$("#notify").hide(1000);
	});
</script>
@endif
<section class="py-10">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 pr-lg-6">
						<div class="row">
							<div class="col-md-4 col-lg-12 mb-4">
								<h5 class="mb-2">Văn phòng làm việc</h5>
								Tầng 1 tòa C6, đường Trần Hữu Dực <br>
								KĐT Mỹ Đình 1, phường Cầu Diễn, quận Nam Từ Liêm, Hà Nội. <br>
								Điện thoại: <a href="tel:+841238859868">0123 885 9868</a>
								
							</div>
							<div class="col-md-4 col-lg-12 mb-4">
								<h5 class="mb-2">Dự án</h5>
								số 28 lô X3 đường Trần Hữu Dực <br>
								phường Cầu Diễn, Nam Từ Liêm, Hà Nội <br>
								Điện thoại: <a href="tel:+841238859868">0123 885 9868</a>
							</div>
							<div class="col-md-4 col-lg-12">
								<h4 class="mb-2">Socials</h4>
								<a class="d-inline-block mt-2" href="#">
									<span class="fa fa-linkedin-square fs-2 mr-2 color-primary">
									</span>
								</a>
								<a class="d-inline-block mt-2" href="#">
									<span class="fa fa-twitter-square fs-2 mx-2 color-primary">
									</span>
								</a>
								<a class="d-inline-block mt-2" href="#">
									<span class="fa fa-facebook-square fs-2 mx-2 color-primary">
									</span>
								</a>
								<a class="d-inline-block mt-2" href="#">
									<span class="fa fa-google-plus-square fs-2 ml-2 color-primary">
									</span>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg mt-4 mt-lg-0">
						<form  action="" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">
								<div class="col-12">
									
									<input class="form-control" name="c_name" type="text" placeholder="Họ tên" required>
								</div>
								<div class="col-12 mt-4">
									<input class="form-control" name="c_email" type="email" placeholder="Email" required>
								</div>
								<div class="col-12 mt-4">
									<input class="form-control" name="c_phone" type="number" placeholder="Số điện thoại" required>
								</div>
								<div class="col-12 mt-4">
									<textarea class="form-control" name="c_message" rows="6" placeholder="Tin nhắn..." required>
									</textarea>
								</div>
								<div class="col-12 mt-4">
									<div class="row">
										<div class="col-auto">
											<button class="btn btn-md-lg btn-primary" type="Submit"> <span class="color-white fw-600">Send Now</span>
											</button>
										</div>
										
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="col-12 mt-8" id="map" style="min-height: 400px;width: 100%;z-index: 100">

					</div>
					<script>
								var map;
			                  function initMap() {
			                    var myLatLng = {lat: 21.0305084, lng: 105.7609401};
			                    map = new google.maps.Map(document.getElementById('map'), {
			                      center: myLatLng,
			                      zoom: 15,
			                      theme:'Silver'
			                    });
			                    var marker = new google.maps.Marker({
			                      position: myLatLng,
			                      map: map,
			                      title: 'Florence Trần Hữu Dực'
			                    	});
                  				}
						</script>
				</div>
				<!--/.row-->
			</div>
			<!--/.container-->
		</section>
		
@endsection